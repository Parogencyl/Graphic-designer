<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $lang['pl'] = array(
            'titleMain' => 'Projekty',
            'titleSecond' => 'Wszystkie moje realizacje',
            'mainText' => 'Realizując każde zlecenie staram się podchodzić w sposób indywidualny skupiając się nad nim w 100%, aby został wykonany perfekcyjne nawet w najmniejszych detalach. Do pracy stosuję najnowsze technologie oraz narzędzia, dzięki czemu jestem w stanie dopracować projekt nawet w najmniejszych szczegółach. Staram się być jak najbardziej kreatywna co przekłada się na uniwersalność każdego projektu. Tylko dzięki takiemu podejściu mogę zapewnić satysfakcję swoim Klientom.',
            'Button1' => 'WSZYSTKO',
            'Button2' => 'LOGO / BANER',
            'Button3' => 'Prezentacja / WWW',
            'Button4' => 'WIZYTÓWKA / REKLAMA',
            'logo' => 'Logo',
            'baner' => 'Baner',
            'webpage' => 'Strona internetowa',
            'advertisement' => 'Reklama',
            'businessCard' => 'Wizytówka',
            'multimedia' => 'Prezentacja'
        );
    
        $lang['eng'] = array(
            'titleMain' => 'Projects',
            'titleSecond' => 'All my realizations',
            'mainText' => 'When carrying out each order I try to approach it individually, focusing on it in 100% to make it perfect even in the smallest details. I use the latest technologies and tools to work, so I am able to refine the project even in the smallest details. I try to be as creative as possible, which translates into the universality of each project. Only thanks to this approach I can ensure the satisfaction of my clients.',
            'Button1' => 'ALL',
            'Button2' => 'LOGO / BANER',
            'Button3' => 'PRESENTATION / WWW',
            'Button4' => 'BUSINESS CARD / ADVERTISEMENT',
            'logo' => 'Logo',
            'baner' => 'Baner',
            'webpage' => 'Webpage',
            'advertisement' => 'Advertisement',
            'businessCard' => 'Business Card',
            'multimedia' => 'Presentation'
        );

        return view('/projects', compact('lang'));
    }
}
