<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $lang['pl'] = array(
            'titleMain' => 'Oferta',
            'titleSecond' => 'Tutaj znajdziesz większość wykonywach rzeczy przeze mnie',
            'mainTextLeft' => 'Zakres pracy jest, które realizuje jest duży przez wzgląd na różnorodne potrzeby wykorzystania grafiki użytkowej dla osób prywatnych jak i przedsiębiorstw. Wszystkie projekty tworzone są z jak największą dbałością o szczegóły, tak by idealnie odwzorować oczekiwania kliektów oraz jak najlepiej oddać spójność projektu z firmą, bądź jego przeznaczeniem. Wieloletnie doświadczenie pomaga mi w podejściu do Klienta i wykonaniu jak najlepiej projektu. Poniżej znajduje się zakres prac najczęściej wykonywanych przeze mnie. Jeśli na liście nie znajduje się to, czego poszukujesz',
            'mainTextButton' => 'napisz do mnie',
            'mainTextRight' => 'lub zadzwoń, a postaram się strostać i temu zadaniu.',
          
            'offer1Title' => 'Stworzenie Logo',
            'offer1Text' => 'Logo jest nieodzownym elementem każdej firmy. To właśnie ono jest najczęściej zapamiętywanem dlatego powinno być ono uniwersalne, przemyślane, a zwłaszcza spójne z firmą.',
            'offer1Title2' => 'Oferta zawiera dwa projekty',
            'offer1Price' => '300zł',
            
            'offer2Title' => 'Prezentacja multimedialna',
            'offer2Text' => 'Wykonuję także prezentacje multimedialne.',
            'offer2Price' => '250zł',
            
            'offer3Title' => 'Projektowanie Baneru',
            'offer3Text' => 'Banery są jednym z najczęstszych form przekazu. Realizuję zarówno banery przygotowane do wydruku jak i na strony internetowe.',
            'offer3Price' => '500zł',
            
            'offer4Title' => 'Wizytówka / Ulotka',
            'offer4Text' => 'Wizytówka jest niezbędnikiem właściela każdej firmy. Dzięki niej możemy bezpośrednio przedstawić swoją firmę.',
            'offer4Title2' => 'Oferta zawiera dwa projekty',
            'offer4Price' => '150zł',
    
            'offer5Title' => 'Projekt oraz wykonanie strony internetowej',
            'offer5Text' => 'Internet jest aktualnie najpężniej rozmijającym się i dającym wiele możliwości miejscem. Właśnie na promocje w świecie online firmy przeznaczają najwięcej pieniędzy. Dlatego oferuję zaprojektowanie oraz wykonanie resposnych stron internetowych.',
            'offer5Price' => '1600zł',
    
            'offer6Title' => 'Projekt indywidualny',
            'offer6Text' => 'Potrzebujesz czegoś innego? Często podejmuję się różnych wyzwań, to tego też się podejmę. Skotkaktuj się ze mną i podziel się swoim pomysłem.',
            
            'offerButton' => 'Zamów',
            'offerButtonContact' => 'Kontakt'
        );
    
        $lang['eng'] = array(
            'titleMain' => 'Offer',
            'titleSecond' => 'Here you will find most of the executions of things by me',
            'mainTextLeft' => 'The scope of the work is large because of the different needs for the use of graphic design for individuals and businesses. All projects are created with the greatest attention to detail, so as to perfectly reflect the expectations of customers and best reflect the consistency of the project with the company or its purpose. Many years of experience helps me in approaching the client and making the best possible project. Below you will find the range of works most often performed by me. If the list does not include what you are looking for',
            'mainTextButton' => 'write to me',
            'mainTextRight' => "or call me, and I'll try to keep up with the task as well.",
          
            'offer1Title' => 'Creating a logo',
            'offer1Text' => 'Logo is an indispensable element of every company. It is the one most frequently remembered, so it should be universal, well thought-out, and especially consistent with the company.',
            'offer1Title2' => 'The offer includes two projects',
            'offer1Price' => '80$',
            
            'offer2Title' => 'Multimedia presentation',
            'offer2Text' => 'I also make multimedia presentations.',
            'offer2Price' => '75$',
            
            'offer3Title' => 'Banner design',
            'offer3Text' => 'Banners are one of the most common forms of communication. I realize both banners prepared for printing and for websites.',
            'offer3Price' => '130$',
            
            'offer4Title' => 'Business card / Flyer',
            'offer4Text' => 'A business card is an indispensable part of the owner of any company. Thanks to it we can present our company directly.',
            'offer4Title2' => 'The offer includes two projects',
            'offer4Price' => '40$',
    
            'offer5Title' => 'Design and implementation of the website',
            'offer5Text' => 'The Internet is currently the most expanding and offering many opportunities. It is the promotions in the online world that companies spend most money on. That is why I offer to design and make respossible websites.',
            'offer5Price' => '420$',
    
            'offer6Title' => 'Individual project',
            'offer6Text' => "Need something else? I often take on different challenges, that's what I will take on. Contact me and share your idea.",
            
            'offerButton' => 'Buy',
            'offerButtonContact' => 'Contact'
        );

        return view('/offers', compact('lang'));
    }
}
