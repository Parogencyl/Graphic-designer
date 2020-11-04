<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $lang['pl'] = array(
            'titleMain1' => 'Kilka słów o mnie',
            'titleSecond1' => 'CZYLI OPOWIEM KIM JESTEM ORAZ CZYM SIĘ ZAJMUJĘ',
            'mainText1' => 'W pierwszej kolejności, chciałbym powiedzieć, iż miło mi gościć Was na mojej stronie.',
            'mainText1Left' => 'Projektowanie graficzne to nie tylko moja praca, ale również pasja i sposób na życie. Od zawsze fascynowało mnie rysowanie, tworzenie grafiki oraz projektowanie. Dalszej częściach strony będziecie mogli zapoznać się z efektami mojej pracy. Poniżej znajdują się jedne z wielu wykonanych projektów. Jeżeli zależy Ci na spójnych i miłych dla oczu projektach, to dobrze trafiłeś! Wstępny cennik znajduje się na stronie',
            'mainText1Button' => 'Oferta',
            'mainText1Right' => ', do której zajrzenia zachęcam.',
            'mainText1Welcome' => 'Zapraszam do współpracy.',
            'saying1' => 'Sukces nigdy nie jest ostateczny. Porażka nigdy nie jest totalna. Liczy się tylko odwaga.',
            'author1' => 'Winston Churchill',
            'titleMain2' => 'Projekty',
            'titleSecond2' => 'OTO CZĘŚĆ PRAC WYKONANYCH PRZEZE MNIE',
            'projectsButton' => 'Zobacz więcej ',
            'saying2' => 'Każde nowe doświadczenie poszerza horyzonty, każda nowa umiejętność pozwala się rozwijać... Wiem, że to brzmi jak pieprzenie w bambus, ale taka jest prawda.',
            'author2' => 'Colin Farrell',
            'titleMain3' => 'Kontakt',
            'titleSecond3' => 'NAPISZ LUB ZADZWOŃ DO MNIE',
            'contactText' => 'Proszę kontaktować się ze mną w godzinach 8:00 - 18:00 od poniedziałku do piątku. W sprawach pilnych można również dzownić w soboty.',
            'placeholder1' => 'Imię i Nazwisko',
            'placeholder2' => 'Numer Telefonu',
            'placeholder3' => 'Email',
            'placeholder4' => 'Tytuł',
            'placeholder5' => 'Treść Wiadomości',
            'formButton' => 'Wyślij',
            'logo' => 'Logo',
            'baner' => 'Baner',
            'webpage' => 'Strona internetowa',
            'advertisement' => 'Reklama',
            'businessCard' => 'Wizytówka',
            'multimedia' => 'Prezentacja'
        );
    
        $lang['eng'] = array(
            'titleMain1' => 'A few word about me',
            'titleSecond1' => 'THAT IS, I WILL TELL YOU WHO I AM AND WHAT I DO.',
            'mainText1' => 'First of all, I would like to say that I am pleased to welcome you on my site.',
            'mainText1Left' => "Graphic design is not only my job but also my passion and way of life. I have always been fascinated with drawing, graphic design and design. In the further part of the page you will be able to see the effects of my work. Below are some of the many projects made. If you care about coherent and pleasing to the eye projects, you've come to the right place! Preliminary price list can be found on",
            'mainText1Button' => 'Offer',
            'mainText1Right' => ', which I encourage you to look into.',
            'mainText1Welcome' => 'I invite you to cooperation.',
            'saying1' => 'Success is never final. Failure is never total. All that matters is courage.',
            'author1' => 'Winston Churchill',
            'titleMain2' => 'Projects',
            'titleSecond2' => "HERE'S SOME OF THE WORK I'VE DONE",
            'projectsButton' => 'See more',
            'saying2' => "Every new experience broadens horizons, every new skill allows to develop... I know it sounds like fucking bamboo, but that's the truth.",
            'author2' => 'Colin Farrell',
            'titleMain3' => 'Contact',
            'titleSecond3' => 'WRITE OR CALL ME',
            'contactText' => 'Please contact me between 8am and 6pm Monday to Friday. For urgent matters you can also call me on Saturdays.',
            'placeholder1' => 'First and last name',
            'placeholder2' => 'Phone Number',
            'placeholder3' => 'Email',
            'placeholder4' => 'Title',
            'placeholder5' => 'Message',
            'formButton' => 'Send',
            'logo' => 'Logo',
            'baner' => 'Baner',
            'webpage' => 'Webpage',
            'advertisement' => 'Advertisement',
            'businessCard' => 'Business Card',
            'multimedia' => 'Presentation'
        );

        return view('/index', compact('lang'));
    }
}
