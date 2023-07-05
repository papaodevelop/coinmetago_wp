<?php

class td_fonts {


	// font stacks
    static $font_stack_list = array(
        'fs_1' => 'Verdana, Geneva, sans-serif',
        'fs_2' => '"Helvetica Neue", Helvetica, Arial, sans-serif',
        'fs_3' => 'Baskerville, "Times New Roman", Times, serif',
        'fs_4' => 'Garamond, "Hoefler Text", "Times New Roman", Times, serif',
        'fs_5' => 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif',
        'fs_6' => 'GillSans, Calibri, Trebuchet, sans-serif',
        'fs_7' => 'Georgia, Times, "Times New Roman", serif',
        'fs_8' => 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif',
        'fs_9' => 'Tahoma, Verdana, Geneva',
        'fs_10' => 'Trebuchet, Tahoma, Arial, sans-serif',
    );


    // google fonts
    static $font_names_google_list = array (
        1 => 'ABeeZee',
		2 => 'Abel',
		3 => 'Abril Fatface',
		4 => 'Aclonica',
		5 => 'Acme',
		6 => 'Actor',
		7 => 'Adamina',
		8 => 'Advent Pro',
		9 => 'Aguafina Script',
		10 => 'Akronim',
		11 => 'Aladin',
		12 => 'Aldrich',
		13 => 'Alef',
		14 => 'Alegreya',
		15 => 'Alegreya SC',
		16 => 'Alex Brush',
		17 => 'Alfa Slab One',
		18 => 'Alice',
		19 => 'Alike',
		20 => 'Alike Angular',
		21 => 'Allan',
		22 => 'Allerta',
		23 => 'Allerta Stencil',
		24 => 'Allura',
		25 => 'Almendra',
		26 => 'Almendra Display',
		27 => 'Almendra SC',
		28 => 'Amarante',
		29 => 'Amaranth',
		30 => 'Amatic SC',
		31 => 'Amethysta',
		32 => 'Anaheim',
		33 => 'Andada',
		34 => 'Andika',
		35 => 'Angkor',
		36 => 'Annie Use Your Telescope',
		37 => 'Anonymous Pro',
		38 => 'Antic',
		39 => 'Antic Didone',
		40 => 'Antic Slab',
		41 => 'Anton',
		42 => 'Arapey',
		43 => 'Arbutus',
		44 => 'Arbutus Slab',
		45 => 'Architects Daughter',
		46 => 'Archivo Black',
		47 => 'Archivo Narrow',
		48 => 'Arimo',
		49 => 'Arizonia',
		50 => 'Armata',
		51 => 'Artifika',
		52 => 'Arvo',
		53 => 'Asap',
		54 => 'Asset',
		55 => 'Astloch',
		56 => 'Asul',
		57 => 'Atomic Age',
		58 => 'Aubrey',
		59 => 'Audiowide',
		60 => 'Autour One',
		61 => 'Average',
		62 => 'Average Sans',
		63 => 'Averia Gruesa Libre',
		64 => 'Averia Libre',
		65 => 'Averia Sans Libre',
		66 => 'Averia Serif Libre',
		67 => 'Bad Script',
		68 => 'Balthazar',
		69 => 'Bangers',
		70 => 'Basic',
		71 => 'Battambang',
		72 => 'Baumans',
		73 => 'Bayon',
		74 => 'Belgrano',
		75 => 'Belleza',
		76 => 'BenchNine',
		77 => 'Bentham',
		78 => 'Berkshire Swash',
		79 => 'Bevan',
		80 => 'Bigelow Rules',
		81 => 'Bigshot One',
		82 => 'Bilbo',
		83 => 'Bilbo Swash Caps',
		84 => 'Bitter',
		85 => 'Black Ops One',
		86 => 'Bokor',
		87 => 'Bonbon',
		88 => 'Boogaloo',
		89 => 'Bowlby One',
		90 => 'Bowlby One SC',
		91 => 'Brawler',
		92 => 'Bree Serif',
		93 => 'Bubblegum Sans',
		94 => 'Bubbler One',
		95 => 'Buda',
		96 => 'Buenard',
		97 => 'Butcherman',
		98 => 'Butterfly Kids',
		99 => 'Cabin',
		100 => 'Cabin Condensed',
		101 => 'Cabin Sketch',
		102 => 'Caesar Dressing',
		103 => 'Cagliostro',
		104 => 'Calligraffitti',
		105 => 'Cambo',
		106 => 'Candal',
		107 => 'Cantarell',
		108 => 'Cantata One',
		109 => 'Cantora One',
		110 => 'Capriola',
		111 => 'Cardo',
		112 => 'Carme',
		113 => 'Carrois Gothic',
		114 => 'Carrois Gothic SC',
		115 => 'Carter One',
		116 => 'Caudex',
		117 => 'Cedarville Cursive',
		118 => 'Ceviche One',
		119 => 'Changa One',
		120 => 'Chango',
		121 => 'Chau Philomene One',
		122 => 'Chela One',
		123 => 'Chelsea Market',
		124 => 'Chenla',
		125 => 'Cherry Cream Soda',
		126 => 'Cherry Swash',
		127 => 'Chewy',
		128 => 'Chicle',
		129 => 'Chivo',
		130 => 'Cinzel',
		131 => 'Cinzel Decorative',
		132 => 'Clicker Script',
		133 => 'Coda',
		134 => 'Coda Caption',
		135 => 'Codystar',
		136 => 'Combo',
		137 => 'Comfortaa',
		138 => 'Coming Soon',
		139 => 'Concert One',
		140 => 'Condiment',
		141 => 'Content',
		142 => 'Contrail One',
		143 => 'Convergence',
		144 => 'Cookie',
		145 => 'Copse',
		146 => 'Corben',
		147 => 'Courgette',
		148 => 'Cousine',
		149 => 'Coustard',
		150 => 'Covered By Your Grace',
		151 => 'Crafty Girls',
		152 => 'Creepster',
		153 => 'Crete Round',
		154 => 'Crimson Text',
		155 => 'Croissant One',
		156 => 'Crushed',
		157 => 'Cuprum',
		158 => 'Cutive',
		159 => 'Cutive Mono',
		160 => 'Damion',
		161 => 'Dancing Script',
		162 => 'Dangrek',
		163 => 'Dawning of a New Day',
		164 => 'Days One',
		165 => 'Delius',
		166 => 'Delius Swash Caps',
		167 => 'Delius Unicase',
		168 => 'Della Respira',
		169 => 'Denk One',
		170 => 'Devonshire',
		171 => 'Didact Gothic',
		172 => 'Diplomata',
		173 => 'Diplomata SC',
		174 => 'Domine',
		175 => 'Donegal One',
		176 => 'Doppio One',
		177 => 'Dorsa',
		178 => 'Dosis',
		179 => 'Dr Sugiyama',
		180 => 'Droid Sans',
		181 => 'Droid Sans Mono',
		182 => 'Droid Serif',
		183 => 'Duru Sans',
		184 => 'Dynalight',
		185 => 'EB Garamond',
		186 => 'Eagle Lake',
		187 => 'Eater',
		188 => 'Economica',
		189 => 'Electrolize',
		190 => 'Elsie',
		191 => 'Elsie Swash Caps',
		192 => 'Emblema One',
		193 => 'Emilys Candy',
		194 => 'Engagement',
		195 => 'Englebert',
		196 => 'Enriqueta',
		197 => 'Erica One',
		198 => 'Esteban',
		199 => 'Euphoria Script',
		200 => 'Ewert',
		201 => 'Exo',
		202 => 'Expletus Sans',
		203 => 'Fanwood Text',
		204 => 'Fascinate',
		205 => 'Fascinate Inline',
		206 => 'Faster One',
		207 => 'Fasthand',
		208 => 'Fauna One',
		209 => 'Federant',
		210 => 'Federo',
		211 => 'Felipa',
		212 => 'Fenix',
		213 => 'Finger Paint',
		214 => 'Fjalla One',
		215 => 'Fjord One',
		216 => 'Flamenco',
		217 => 'Flavors',
		218 => 'Fondamento',
		219 => 'Fontdiner Swanky',
		220 => 'Forum',
		221 => 'Francois One',
		222 => 'Freckle Face',
		223 => 'Fredericka the Great',
		224 => 'Fredoka One',
		225 => 'Freehand',
		226 => 'Fresca',
		227 => 'Frijole',
		228 => 'Fruktur',
		229 => 'Fugaz One',
		230 => 'GFS Didot',
		231 => 'GFS Neohellenic',
		232 => 'Gabriela',
		233 => 'Gafata',
		234 => 'Galdeano',
		235 => 'Galindo',
		236 => 'Gentium Basic',
		237 => 'Gentium Book Basic',
		238 => 'Geo',
		239 => 'Geostar',
		240 => 'Geostar Fill',
		241 => 'Germania One',
		242 => 'Gilda Display',
		243 => 'Give You Glory',
		244 => 'Glass Antiqua',
		245 => 'Glegoo',
		246 => 'Gloria Hallelujah',
		247 => 'Goblin One',
		248 => 'Gochi Hand',
		249 => 'Gorditas',
		250 => 'Goudy Bookletter 1911',
		251 => 'Graduate',
		252 => 'Grand Hotel',
		253 => 'Gravitas One',
		254 => 'Great Vibes',
		255 => 'Griffy',
		256 => 'Gruppo',
		257 => 'Gudea',
		258 => 'Habibi',
		259 => 'Hammersmith One',
		260 => 'Hanalei',
		261 => 'Hanalei Fill',
		262 => 'Handlee',
		263 => 'Hanuman',
		264 => 'Happy Monkey',
		265 => 'Headland One',
		266 => 'Henny Penny',
		267 => 'Herr Von Muellerhoff',
		268 => 'Holtwood One SC',
		269 => 'Homemade Apple',
		270 => 'Homenaje',
		271 => 'IM Fell DW Pica',
		272 => 'IM Fell DW Pica SC',
		273 => 'IM Fell Double Pica',
		274 => 'IM Fell Double Pica SC',
		275 => 'IM Fell English',
		276 => 'IM Fell English SC',
		277 => 'IM Fell French Canon',
		278 => 'IM Fell French Canon SC',
		279 => 'IM Fell Great Primer',
		280 => 'IM Fell Great Primer SC',
		281 => 'Iceberg',
		282 => 'Iceland',
		283 => 'Imprima',
		284 => 'Inconsolata',
		285 => 'Inder',
		286 => 'Indie Flower',
		287 => 'Inika',
		288 => 'Irish Grover',
		289 => 'Istok Web',
		290 => 'Italiana',
		291 => 'Italianno',
		292 => 'Jacques Francois',
		293 => 'Jacques Francois Shadow',
		294 => 'Jim Nightshade',
		295 => 'Jockey One',
		296 => 'Jolly Lodger',
		297 => 'Josefin Sans',
		298 => 'Josefin Slab',
		299 => 'Joti One',
		300 => 'Judson',
		301 => 'Julee',
		302 => 'Julius Sans One',
		303 => 'Junge',
		304 => 'Jura',
		305 => 'Just Another Hand',
		306 => 'Just Me Again Down Here',
		307 => 'Kameron',
		308 => 'Karla',
		309 => 'Kaushan Script',
		310 => 'Kavoon',
		311 => 'Keania One',
		312 => 'Kelly Slab',
		313 => 'Kenia',
		314 => 'Khmer',
		315 => 'Kite One',
		316 => 'Knewave',
		317 => 'Kotta One',
		318 => 'Koulen',
		319 => 'Kranky',
		320 => 'Kreon',
		321 => 'Kristi',
		322 => 'Krona One',
		323 => 'La Belle Aurore',
		324 => 'Lancelot',
		325 => 'Lato',
		326 => 'League Script',
		327 => 'Leckerli One',
		328 => 'Ledger',
		329 => 'Lekton',
		330 => 'Lemon',
		331 => 'Libre Baskerville',
		332 => 'Life Savers',
		333 => 'Lilita One',
		334 => 'Lily Script One',
		335 => 'Limelight',
		336 => 'Linden Hill',
		337 => 'Lobster',
		338 => 'Lobster Two',
		339 => 'Londrina Outline',
		340 => 'Londrina Shadow',
		341 => 'Londrina Sketch',
		342 => 'Londrina Solid',
		343 => 'Lora',
		344 => 'Love Ya Like A Sister',
		345 => 'Loved by the King',
		346 => 'Lovers Quarrel',
		347 => 'Luckiest Guy',
		348 => 'Lusitana',
		349 => 'Lustria',
		350 => 'Macondo',
		351 => 'Macondo Swash Caps',
		352 => 'Magra',
		353 => 'Maiden Orange',
		354 => 'Mako',
		355 => 'Marcellus',
		356 => 'Marcellus SC',
		357 => 'Marck Script',
		358 => 'Margarine',
		359 => 'Marko One',
		360 => 'Marmelad',
		361 => 'Marvel',
		362 => 'Mate',
		363 => 'Mate SC',
		364 => 'Maven Pro',
		365 => 'McLaren',
		366 => 'Meddon',
		367 => 'MedievalSharp',
		368 => 'Medula One',
		369 => 'Megrim',
		370 => 'Meie Script',
		371 => 'Merienda',
		372 => 'Merienda One',
		373 => 'Merriweather',
		374 => 'Merriweather Sans',
		375 => 'Metal',
		376 => 'Metal Mania',
		377 => 'Metamorphous',
		378 => 'Metrophobic',
		379 => 'Michroma',
		380 => 'Milonga',
		381 => 'Miltonian',
		382 => 'Miltonian Tattoo',
		383 => 'Miniver',
		384 => 'Miss Fajardose',
		385 => 'Modern Antiqua',
		386 => 'Molengo',
		387 => 'Molle',
		388 => 'Monda',
		389 => 'Monofett',
		390 => 'Monoton',
		391 => 'Monsieur La Doulaise',
		392 => 'Montaga',
		393 => 'Montez',
		394 => 'Montserrat',
		395 => 'Montserrat Alternates',
		396 => 'Montserrat Subrayada',
		397 => 'Moul',
		398 => 'Moulpali',
		399 => 'Mountains of Christmas',
		400 => 'Mouse Memoirs',
		401 => 'Mr Bedfort',
		402 => 'Mr Dafoe',
		403 => 'Mr De Haviland',
		404 => 'Mrs Saint Delafield',
		405 => 'Mrs Sheppards',
		406 => 'Muli',
		407 => 'Mystery Quest',
		408 => 'Neucha',
		409 => 'Neuton',
		410 => 'New Rocker',
		411 => 'News Cycle',
		412 => 'Niconne',
		413 => 'Nixie One',
		414 => 'Nobile',
		415 => 'Nokora',
		416 => 'Norican',
		417 => 'Nosifer',
		418 => 'Nothing You Could Do',
		419 => 'Noticia Text',
		420 => 'Noto Sans',
		421 => 'Noto Serif',
		422 => 'Nova Cut',
		423 => 'Nova Flat',
		424 => 'Nova Mono',
		425 => 'Nova Oval',
		426 => 'Nova Round',
		427 => 'Nova Script',
		428 => 'Nova Slim',
		429 => 'Nova Square',
		430 => 'Numans',
		431 => 'Nunito',
		432 => 'Odor Mean Chey',
		433 => 'Offside',
		434 => 'Old Standard TT',
		435 => 'Oldenburg',
		436 => 'Oleo Script',
		437 => 'Oleo Script Swash Caps',
		438 => 'Open Sans',
		439 => 'Open Sans Condensed',
		440 => 'Oranienbaum',
		441 => 'Orbitron',
		442 => 'Oregano',
		443 => 'Orienta',
		444 => 'Original Surfer',
		445 => 'Oswald',
		446 => 'Over the Rainbow',
		447 => 'Overlock',
		448 => 'Overlock SC',
		449 => 'Ovo',
		450 => 'Oxygen',
		451 => 'Oxygen Mono',
		452 => 'PT Mono',
		453 => 'PT Sans',
		454 => 'PT Sans Caption',
		455 => 'PT Sans Narrow',
		456 => 'PT Serif',
		457 => 'PT Serif Caption',
		458 => 'Pacifico',
		459 => 'Paprika',
		460 => 'Parisienne',
		461 => 'Passero One',
		462 => 'Passion One',
		463 => 'Pathway Gothic One',
		464 => 'Patrick Hand',
		465 => 'Patrick Hand SC',
		466 => 'Patua One',
		467 => 'Paytone One',
		468 => 'Peralta',
		469 => 'Permanent Marker',
		470 => 'Petit Formal Script',
		471 => 'Petrona',
		472 => 'Philosopher',
		473 => 'Piedra',
		474 => 'Pinyon Script',
		475 => 'Pirata One',
		476 => 'Plaster',
		477 => 'Play',
		478 => 'Playball',
		479 => 'Playfair Display',
		480 => 'Playfair Display SC',
		481 => 'Podkova',
		482 => 'Poiret One',
		483 => 'Poller One',
		484 => 'Poly',
		485 => 'Pompiere',
		486 => 'Pontano Sans',
		487 => 'Port Lligat Sans',
		488 => 'Port Lligat Slab',
		489 => 'Prata',
		490 => 'Preahvihear',
		491 => 'Press Start 2P',
		492 => 'Princess Sofia',
		493 => 'Prociono',
		494 => 'Prosto One',
		495 => 'Puritan',
		496 => 'Purple Purse',
		497 => 'Quando',
		498 => 'Quantico',
		499 => 'Quattrocento',
		500 => 'Quattrocento Sans',
		501 => 'Questrial',
		502 => 'Quicksand',
		503 => 'Quintessential',
		504 => 'Qwigley',
		505 => 'Racing Sans One',
		506 => 'Radley',
		507 => 'Raleway',
		508 => 'Raleway Dots',
		509 => 'Rambla',
		510 => 'Rammetto One',
		511 => 'Ranchers',
		512 => 'Rancho',
		513 => 'Rationale',
		514 => 'Redressed',
		515 => 'Reenie Beanie',
		516 => 'Revalia',
		517 => 'Ribeye',
		518 => 'Ribeye Marrow',
		519 => 'Righteous',
		520 => 'Risque',
		521 => 'Roboto',
		522 => 'Roboto Condensed',
		523 => 'Roboto Slab',
		524 => 'Rochester',
		525 => 'Rock Salt',
		526 => 'Rokkitt',
		527 => 'Romanesco',
		528 => 'Ropa Sans',
		529 => 'Rosario',
		530 => 'Rosarivo',
		531 => 'Rouge Script',
		532 => 'Ruda',
		533 => 'Rufina',
		534 => 'Ruge Boogie',
		535 => 'Ruluko',
		536 => 'Rum Raisin',
		537 => 'Ruslan Display',
		538 => 'Russo One',
		539 => 'Ruthie',
		540 => 'Rye',
		541 => 'Sacramento',
		542 => 'Sail',
		543 => 'Salsa',
		544 => 'Sanchez',
		545 => 'Sancreek',
		546 => 'Sansita One',
		547 => 'Sarina',
		548 => 'Satisfy',
		549 => 'Scada',
		550 => 'Schoolbell',
		551 => 'Seaweed Script',
		552 => 'Sevillana',
		553 => 'Seymour One',
		554 => 'Shadows Into Light',
		555 => 'Shadows Into Light Two',
		556 => 'Shanti',
		557 => 'Share',
		558 => 'Share Tech',
		559 => 'Share Tech Mono',
		560 => 'Shojumaru',
		561 => 'Short Stack',
		562 => 'Siemreap',
		563 => 'Sigmar One',
		564 => 'Signika',
		565 => 'Signika Negative',
		566 => 'Simonetta',
		567 => 'Sintony',
		568 => 'Sirin Stencil',
		569 => 'Six Caps',
		570 => 'Skranji',
		571 => 'Slackey',
		572 => 'Smokum',
		573 => 'Smythe',
		574 => 'Sniglet',
		575 => 'Snippet',
		576 => 'Snowburst One',
		577 => 'Sofadi One',
		578 => 'Sofia',
		579 => 'Sonsie One',
		580 => 'Sorts Mill Goudy',
		581 => 'Source Code Pro',
		582 => 'Source Sans Pro',
		583 => 'Special Elite',
		584 => 'Spicy Rice',
		585 => 'Spinnaker',
		586 => 'Spirax',
		587 => 'Squada One',
		588 => 'Stalemate',
		589 => 'Stalinist One',
		590 => 'Stardos Stencil',
		591 => 'Stint Ultra Condensed',
		592 => 'Stint Ultra Expanded',
		593 => 'Stoke',
		594 => 'Strait',
		595 => 'Sue Ellen Francisco',
		596 => 'Sunshiney',
		597 => 'Supermercado One',
		598 => 'Suwannaphum',
		599 => 'Swanky and Moo Moo',
		600 => 'Syncopate',
		601 => 'Tangerine',
		602 => 'Taprom',
		603 => 'Tauri',
		604 => 'Telex',
		605 => 'Tenor Sans',
		606 => 'Text Me One',
		607 => 'The Girl Next Door',
		608 => 'Tienne',
		609 => 'Tinos',
		610 => 'Titan One',
		611 => 'Titillium Web',
		612 => 'Trade Winds',
		613 => 'Trocchi',
		614 => 'Trochut',
		615 => 'Trykker',
		616 => 'Tulpen One',
		617 => 'Ubuntu',
		618 => 'Ubuntu Condensed',
		619 => 'Ubuntu Mono',
		620 => 'Ultra',
		621 => 'Uncial Antiqua',
		622 => 'Underdog',
		623 => 'Unica One',
		624 => 'UnifrakturCook',
		625 => 'UnifrakturMaguntia',
		626 => 'Unkempt',
		627 => 'Unlock',
		628 => 'Unna',
		629 => 'VT323',
		630 => 'Vampiro One',
		631 => 'Varela',
		632 => 'Varela Round',
		633 => 'Vast Shadow',
		634 => 'Vibur',
		635 => 'Vidaloka',
		636 => 'Viga',
		637 => 'Voces',
		638 => 'Volkhov',
		639 => 'Vollkorn',
		640 => 'Voltaire',
		641 => 'Waiting for the Sunrise',
		642 => 'Wallpoet',
		643 => 'Walter Turncoat',
		644 => 'Warnes',
		645 => 'Wellfleet',
		646 => 'Wendy One',
		647 => 'Wire One',
		648 => 'Yanone Kaffeesatz',
		649 => 'Yellowtail',
		650 => 'Yeseva One',
		651 => 'Yesteryear',
		652 => 'Zeyada',
		653 => 'Work Sans',
		654 => 'Alegreya Sans',
		655 => 'Alegreya Sans SC',
		656 => 'Amiri',
		657 => 'Amita',
		658 => 'Arya',
		659 => 'Asar',
		660 => 'Biryani',
		661 => 'Cambay',
		662 => 'Catamaran',
		663 => 'Caveat',
		664 => 'Caveat Brush',
		665 => 'Chonburi',
		666 => 'Dekko',
		667 => 'Dhurjati',
		668 => 'Eczar',
		669 => 'Ek Mukta',
		670 => 'Exo 2',
		671 => 'Fira Mono',
		672 => 'Fira Sans',
		673 => 'Gidugu',
		674 => 'Gurajada',
		675 => 'Halant',
		676 => 'Hind',
		677 => 'Hind Siliguri',
		678 => 'Hind Vadodara',
		679 => 'Inknut Antiqua',
		680 => 'Itim',
		681 => 'Jaldi',
		682 => 'Kadwa',
		683 => 'Kalam',
		684 => 'Kantumruy',
		685 => 'Karma',
		686 => 'Kdam Thmor',
		687 => 'Khand',
		688 => 'Khula',
		689 => 'Kurale',
		690 => 'Laila',
		691 => 'Lakki Reddy',
		692 => 'Lateef',
		693 => 'Mallanna',
		694 => 'Mandali',
		695 => 'Martel',
		696 => 'Martel Sans',
		697 => 'Modak',
		698 => 'NTR',
		699 => 'Palanquin',
		700 => 'Palanquin Dark',
		701 => 'Peddana',
		702 => 'Poppins',
		703 => 'Pragati Narrow',
		704 => 'Rajdhani',
		705 => 'Ramabhadra',
		706 => 'Ramaraja',
		707 => 'Ranga',
		708 => 'Ravi Prakash',
		709 => 'Rhodium Libre',
		710 => 'Roboto Mono',
		711 => 'Rozha One',
		712 => 'Rubik',
		713 => 'Rubik Mono One',
		714 => 'Rubik One',
		715 => 'Sahitya',
		716 => 'Sarala',
		717 => 'Sarpanch',
		718 => 'Scheherazade',
		719 => 'Slabo 13px',
		720 => 'Slabo 27px',
		721 => 'Source Serif Pro',
		722 => 'Sree Krushnadevaraya',
		723 => 'Sumana',
		724 => 'Sura',
		725 => 'Suranna',
		726 => 'Suravaram',
		727 => 'Teko',
		728 => 'Tenali Ramakrishna',
		729 => 'Tillana',
		730 => 'Timmana',
		731 => 'Vesper Libre',
		732 => 'Yantramanav',
		733 => 'Abhaya Libre',
		734 => 'Aleo',
		735 => 'Amiko',
		736 => 'Archivo',
		737 => 'Aref Ruqaa',
		738 => 'Arima Madurai',
		739 => 'Arsenal',
		740 => 'Asap Condensed',
		741 => 'Assistant',
		742 => 'Athiti',
		743 => 'Atma',
		744 => 'B612',
		745 => 'B612 Mono',
		746 => 'Bahiana',
		747 => 'Bahianita',
		748 => 'Bai Jamjuree',
		749 => 'Baloo',
		750 => 'Baloo Bhai',
		751 => 'Baloo Bhaijaan',
		752 => 'Baloo Bhaina',
		753 => 'Baloo Chettan',
		754 => 'Baloo Da',
		755 => 'Baloo Paaji',
		756 => 'Baloo Tamma',
		757 => 'Baloo Tammudu',
		758 => 'Baloo Thambi',
		759 => 'Barlow',
		760 => 'Barlow Condensed',
		761 => 'Barlow Semi Condensed',
		762 => 'Barriecito',
		763 => 'Barrio',
		764 => 'Bellefair',
		765 => 'Beth Ellen',
		766 => 'BioRhyme',
		767 => 'BioRhyme Expanded',
		768 => 'Black And White Picture',
		769 => 'Black Han Sans',
		770 => 'Blinker',
		771 => 'Bungee',
		772 => 'Bungee Hairline',
		773 => 'Bungee Inline',
		774 => 'Bungee Outline',
		775 => 'Bungee Shade',
		776 => 'Cairo',
		777 => 'Chakra Petch',
		778 => 'Changa',
		779 => 'Charm',
		780 => 'Charmonman',
		781 => 'Chathura',
		782 => 'Coiny',
		783 => 'Cormorant',
		784 => 'Cormorant Garamond',
		785 => 'Cormorant Infant',
		786 => 'Cormorant SC',
		787 => 'Cormorant Unicase',
		788 => 'Cormorant Upright',
		789 => 'Crimson Pro',
		790 => 'Cute Font',
		791 => 'DM Sans',
		792 => 'DM Serif Display',
		793 => 'DM Serif Text',
		794 => 'Darker Grotesque',
		795 => 'David Libre',
		796 => 'Do Hyeon',
		797 => 'Dokdo',
		798 => 'East Sea Dokdo',
		799 => 'El Messiri',
		800 => 'Encode Sans',
		801 => 'Encode Sans Condensed',
		802 => 'Encode Sans Expanded',
		803 => 'Encode Sans Semi Condensed',
		804 => 'Encode Sans Semi Expanded',
		805 => 'Fahkwang',
		806 => 'Farro',
		807 => 'Farsan',
		808 => 'Faustina',
		809 => 'Fira Code',
		810 => 'Fira Sans Condensed',
		811 => 'Fira Sans Extra Condensed',
		812 => 'Frank Ruhl Libre',
		813 => 'Gaegu',
		814 => 'Galada',
		815 => 'Gamja Flower',
		816 => 'Gothic A1',
		817 => 'Grenze',
		818 => 'Gugi',
		819 => 'Harmattan',
		820 => 'Heebo',
		821 => 'Hi Melody',
		822 => 'Hind Guntur',
		823 => 'Hind Madurai',
		824 => 'IBM Plex Mono',
		825 => 'IBM Plex Sans',
		826 => 'IBM Plex Sans Condensed',
		827 => 'IBM Plex Serif',
		828 => 'Jomhuria',
		829 => 'Jua',
		830 => 'K2D',
		831 => 'Kanit',
		832 => 'Katibeh',
		833 => 'Kavivanar',
		834 => 'Kirang Haerang',
		835 => 'KoHo',
		836 => 'Kodchasan',
		837 => 'Kosugi',
		838 => 'Kosugi Maru',
		839 => 'Krub',
		840 => 'Kumar One',
		841 => 'Kumar One Outline',
		842 => 'Lacquer',
		843 => 'Lalezar',
		844 => 'Lemonada',
		845 => 'Libre Barcode 128',
		846 => 'Libre Barcode 128 Text',
		847 => 'Libre Barcode 39',
		848 => 'Libre Barcode 39 Extended',
		849 => 'Libre Barcode 39 Extended Text',
		850 => 'Libre Barcode 39 Text',
		851 => 'Libre Caslon Display',
		852 => 'Libre Caslon Text',
		853 => 'Libre Franklin',
		854 => 'Literata',
		855 => 'Liu Jian Mao Cao',
		856 => 'Long Cang',
		857 => 'M PLUS 1p',
		858 => 'M PLUS Rounded 1c',
		859 => 'Ma Shan Zheng',
		860 => 'Mada',
		861 => 'Maitree',
		862 => 'Major Mono Display',
		863 => 'Mali',
		864 => 'Manuale',
		865 => 'Markazi Text',
		866 => 'Meera Inimai',
		867 => 'Mina',
		868 => 'Miriam Libre',
		869 => 'Mirza',
		870 => 'Mitr',
		871 => 'Mogra',
		872 => 'Mukta',
		873 => 'Mukta Mahee',
		874 => 'Mukta Malar',
		875 => 'Mukta Vaani',
		876 => 'Nanum Brush Script',
		877 => 'Nanum Gothic',
		878 => 'Nanum Gothic Coding',
		879 => 'Nanum Myeongjo',
		880 => 'Nanum Pen Script',
		881 => 'Niramit',
		882 => 'Notable',
		883 => 'Noto Sans HK',
		884 => 'Noto Sans JP',
		885 => 'Noto Sans KR',
		886 => 'Noto Sans SC',
		887 => 'Noto Sans TC',
		888 => 'Noto Serif JP',
		889 => 'Noto Serif KR',
		890 => 'Noto Serif SC',
		891 => 'Noto Serif TC',
		892 => 'Nunito Sans',
		893 => 'Overpass',
		894 => 'Overpass Mono',
		895 => 'Padauk',
		896 => 'Pangolin',
		897 => 'Pattaya',
		898 => 'Pavanam',
		899 => 'Poor Story',
		900 => 'Pridi',
		901 => 'Prompt',
		902 => 'Proza Libre',
		903 => 'Rakkas',
		904 => 'Rasa',
		905 => 'Red Hat Display',
		906 => 'Red Hat Text',
		907 => 'Reem Kufi',
		908 => 'Saira',
		909 => 'Saira Condensed',
		910 => 'Saira Extra Condensed',
		911 => 'Saira Semi Condensed',
		912 => 'Saira Stencil One',
		913 => 'Sansita',
		914 => 'Sarabun',
		915 => 'Sawarabi Gothic',
		916 => 'Sawarabi Mincho',
		917 => 'Scope One',
		918 => 'Secular One',
		919 => 'Sedgwick Ave',
		920 => 'Sedgwick Ave Display',
		921 => 'Shrikhand',
		922 => 'Single Day',
		923 => 'Song Myung',
		924 => 'Space Mono',
		925 => 'Spectral',
		926 => 'Spectral SC',
		927 => 'Sriracha',
		928 => 'Srisakdi',
		929 => 'Staatliches',
		930 => 'Stylish',
		931 => 'Suez One',
		932 => 'Sunflower',
		933 => 'Tajawal',
		934 => 'Taviraj',
		935 => 'Thasadith',
		936 => 'Trirong',
		937 => 'Vollkorn SC',
		938 => 'Yatra One',
		939 => 'Yeon Sung',
		940 => 'Yrsa',
		941 => 'ZCOOL KuaiLe',
		942 => 'ZCOOL QingKe HuangYou',
		943 => 'ZCOOL XiaoWei',
		944 => 'Zhi Mang Xing',
		945 => 'Zilla Slab',
		946 => 'Zilla Slab Highlight',
		947 => 'Gelasio',
		948 => 'Inter',
		949 => 'Akaya Kanadaka',
		950 => 'Akaya Telivigala',
		951 => 'Alata',
		952 => 'Alatsi',
		953 => 'Allison',
		954 => 'Almarai',
		955 => 'Alumni Sans',
		956 => 'Andada Pro',
		957 => 'Andika New Basic',
		958 => 'Antonio',
		959 => 'Are You Serious',
		960 => 'Atkinson Hyperlegible',
		961 => 'Azeret Mono',
		962 => 'Bakbak One',
		963 => 'Ballet',
		964 => 'Baloo 2',
		965 => 'Baloo Bhai 2',
		966 => 'Baloo Bhaijaan 2',
		967 => 'Baloo Bhaina 2',
		968 => 'Baloo Chettan 2',
		969 => 'Baloo Da 2',
		970 => 'Baloo Paaji 2',
		971 => 'Baloo Tamma 2',
		972 => 'Baloo Tammudu 2',
		973 => 'Baloo Thambi 2',
		974 => 'Balsamiq Sans',
		975 => 'Baskervville',
		976 => 'Be Vietnam Pro',
		977 => 'Bebas Neue',
		978 => 'Bellota',
		979 => 'Bellota Text',
		980 => 'Benne',
		981 => 'Besley',
		982 => 'Big Shoulders Display',
		983 => 'Big Shoulders Inline Display',
		984 => 'Big Shoulders Inline Text',
		985 => 'Big Shoulders Stencil Display',
		986 => 'Big Shoulders Stencil Text',
		987 => 'Big Shoulders Text',
		988 => 'Birthstone',
		989 => 'Birthstone Bounce',
		990 => 'Bodoni Moda',
		991 => 'Bona Nova',
		992 => 'Bonheur Royale',
		993 => 'Brygada 1918',
		994 => 'Caladea',
		995 => 'Calistoga',
		996 => 'Caramel',
		997 => 'Carattere',
		998 => 'Castoro',
		999 => 'Cherish',
		1000 => 'Chilanka',
		1001 => 'Comforter',
		1002 => 'Comforter Brush',
		1003 => 'Comic Neue',
		1004 => 'Commissioner',
		1005 => 'Corinthia',
		1006 => 'Courier Prime',
		1007 => 'DM Mono',
		1008 => 'Dela Gothic One',
		1009 => 'Dongle',
		1010 => 'DotGothic16',
		1011 => 'Encode Sans SC',
		1012 => 'Ephesis',
		1013 => 'Epilogue',
		1014 => 'Estonia',
		1015 => 'Explora',
		1016 => 'Festive',
		1017 => 'Fleur De Leah',
		1018 => 'Flow Block',
		1019 => 'Flow Circular',
		1020 => 'Flow Rounded',
		1021 => 'Fraunces',
		1022 => 'Fuggles',
		1023 => 'Fuzzy Bubbles',
		1024 => 'Gayathri',
		1025 => 'Gemunu Libre',
		1026 => 'Genos',
		1027 => 'Georama',
		1028 => 'Gideon Roman',
		1029 => 'Girassol',
		1030 => 'Glory',
		1031 => 'Gluten',
		1032 => 'Goldman',
		1033 => 'Gotu',
		1034 => 'Gowun Batang',
		1035 => 'Gowun Dodum',
		1036 => 'Grandstander',
		1037 => 'Grechen Fuemen',
		1038 => 'Grenze Gotisch',
		1039 => 'Grey Qo',
		1040 => 'Gupter',
		1041 => 'Gwendolyn',
		1042 => 'Hachi Maru Pop',
		1043 => 'Hahmlet',
		1044 => 'Hepta Slab',
		1045 => 'Hina Mincho',
		1046 => 'Hurricane',
		1047 => 'IBM Plex Sans Arabic',
		1048 => 'IBM Plex Sans Devanagari',
		1049 => 'IBM Plex Sans Hebrew',
		1050 => 'IBM Plex Sans KR',
		1051 => 'IBM Plex Sans Thai',
		1052 => 'IBM Plex Sans Thai Looped',
		1053 => 'Ibarra Real Nova',
		1054 => 'Imbue',
		1055 => 'Imperial Script',
		1056 => 'Inria Sans',
		1057 => 'Inria Serif',
		1058 => 'Inspiration',
		1059 => 'Island Moments',
		1060 => 'JetBrains Mono',
		1061 => 'Jomolhari',
		1062 => 'Jost',
		1063 => 'Kaisei Decol',
		1064 => 'Kaisei HarunoUmi',
		1065 => 'Kaisei Opti',
		1066 => 'Kaisei Tokumin',
		1067 => 'Karantina',
		1068 => 'Kings',
		1069 => 'Kiwi Maru',
		1070 => 'Klee One',
		1071 => 'Koh Santepheap',
		1072 => 'Kolker Brush',
		1073 => 'Kufam',
		1074 => 'Kulim Park',
		1075 => 'Kumbh Sans',
		1076 => 'Langar',
		1077 => 'Lexend',
		1078 => 'Lexend Deca',
		1079 => 'Lexend Exa',
		1080 => 'Lexend Giga',
		1081 => 'Lexend Mega',
		1082 => 'Lexend Peta',
		1083 => 'Lexend Tera',
		1084 => 'Lexend Zetta',
		1085 => 'Libre Barcode EAN13 Text',
		1086 => 'Licorice',
		1087 => 'Livvic',
		1088 => 'Love Light',
		1089 => 'Luxurious Roman',
		1090 => 'Luxurious Script',
		1091 => 'M PLUS 1',
		1092 => 'M PLUS 1 Code',
		1093 => 'M PLUS 2',
		1094 => 'M PLUS Code Latin',
		1095 => 'Manjari',
		1096 => 'Manrope',
		1097 => 'Mansalva',
		1098 => 'Mea Culpa',
		1099 => 'Meow Script',
		1100 => 'Mochiy Pop One',
		1101 => 'Mochiy Pop P One',
		1102 => 'Mohave',
		1103 => 'Montagu Slab',
		1104 => 'MonteCarlo',
		1105 => 'Moo Lah Lah',
		1106 => 'Moon Dance',
		1107 => 'Mulish',
		1108 => 'Murecho',
		1109 => 'MuseoModerno',
		1110 => 'Neonderthaw',
		1111 => 'Nerko One',
		1112 => 'New Tegomin',
		1113 => 'Newsreader',
		1114 => 'Noto Kufi Arabic',
		1115 => 'Noto Music',
		1116 => 'Noto Naskh Arabic',
		1117 => 'Noto Nastaliq Urdu',
		1118 => 'Noto Rashi Hebrew',
		1119 => 'Noto Sans Adlam',
		1120 => 'Noto Sans Adlam Unjoined',
		1121 => 'Noto Sans Anatolian Hieroglyphs',
		1122 => 'Noto Sans Arabic',
		1123 => 'Noto Sans Armenian',
		1124 => 'Noto Sans Avestan',
		1125 => 'Noto Sans Balinese',
		1126 => 'Noto Sans Bamum',
		1127 => 'Noto Sans Bassa Vah',
		1128 => 'Noto Sans Batak',
		1129 => 'Noto Sans Bengali',
		1130 => 'Noto Sans Bhaiksuki',
		1131 => 'Noto Sans Brahmi',
		1132 => 'Noto Sans Buginese',
		1133 => 'Noto Sans Buhid',
		1134 => 'Noto Sans Canadian Aboriginal',
		1135 => 'Noto Sans Carian',
		1136 => 'Noto Sans Caucasian Albanian',
		1137 => 'Noto Sans Chakma',
		1138 => 'Noto Sans Cham',
		1139 => 'Noto Sans Cherokee',
		1140 => 'Noto Sans Coptic',
		1141 => 'Noto Sans Cuneiform',
		1142 => 'Noto Sans Cypriot',
		1143 => 'Noto Sans Deseret',
		1144 => 'Noto Sans Devanagari',
		1145 => 'Noto Sans Display',
		1146 => 'Noto Sans Duployan',
		1147 => 'Noto Sans Egyptian Hieroglyphs',
		1148 => 'Noto Sans Elbasan',
		1149 => 'Noto Sans Elymaic',
		1150 => 'Noto Sans Georgian',
		1151 => 'Noto Sans Glagolitic',
		1152 => 'Noto Sans Gothic',
		1153 => 'Noto Sans Grantha',
		1154 => 'Noto Sans Gujarati',
		1155 => 'Noto Sans Gunjala Gondi',
		1156 => 'Noto Sans Gurmukhi',
		1157 => 'Noto Sans Hanifi Rohingya',
		1158 => 'Noto Sans Hanunoo',
		1159 => 'Noto Sans Hatran',
		1160 => 'Noto Sans Hebrew',
		1161 => 'Noto Sans Imperial Aramaic',
		1162 => 'Noto Sans Indic Siyaq Numbers',
		1163 => 'Noto Sans Inscriptional Pahlavi',
		1164 => 'Noto Sans Inscriptional Parthian',
		1165 => 'Noto Sans Javanese',
		1166 => 'Noto Sans Kaithi',
		1167 => 'Noto Sans Kannada',
		1168 => 'Noto Sans Kayah Li',
		1169 => 'Noto Sans Kharoshthi',
		1170 => 'Noto Sans Khmer',
		1171 => 'Noto Sans Khojki',
		1172 => 'Noto Sans Khudawadi',
		1173 => 'Noto Sans Lao',
		1174 => 'Noto Sans Lepcha',
		1175 => 'Noto Sans Limbu',
		1176 => 'Noto Sans Linear A',
		1177 => 'Noto Sans Linear B',
		1178 => 'Noto Sans Lisu',
		1179 => 'Noto Sans Lycian',
		1180 => 'Noto Sans Lydian',
		1181 => 'Noto Sans Mahajani',
		1182 => 'Noto Sans Malayalam',
		1183 => 'Noto Sans Mandaic',
		1184 => 'Noto Sans Manichaean',
		1185 => 'Noto Sans Marchen',
		1186 => 'Noto Sans Masaram Gondi',
		1187 => 'Noto Sans Math',
		1188 => 'Noto Sans Mayan Numerals',
		1189 => 'Noto Sans Medefaidrin',
		1190 => 'Noto Sans Meetei Mayek',
		1191 => 'Noto Sans Meroitic',
		1192 => 'Noto Sans Miao',
		1193 => 'Noto Sans Modi',
		1194 => 'Noto Sans Mongolian',
		1195 => 'Noto Sans Mono',
		1196 => 'Noto Sans Mro',
		1197 => 'Noto Sans Multani',
		1198 => 'Noto Sans Myanmar',
		1199 => 'Noto Sans N Ko',
		1200 => 'Noto Sans Nabataean',
		1201 => 'Noto Sans New Tai Lue',
		1202 => 'Noto Sans Newa',
		1203 => 'Noto Sans Nushu',
		1204 => 'Noto Sans Ogham',
		1205 => 'Noto Sans Ol Chiki',
		1206 => 'Noto Sans Old Hungarian',
		1207 => 'Noto Sans Old Italic',
		1208 => 'Noto Sans Old North Arabian',
		1209 => 'Noto Sans Old Permic',
		1210 => 'Noto Sans Old Persian',
		1211 => 'Noto Sans Old Sogdian',
		1212 => 'Noto Sans Old South Arabian',
		1213 => 'Noto Sans Old Turkic',
		1214 => 'Noto Sans Oriya',
		1215 => 'Noto Sans Osage',
		1216 => 'Noto Sans Osmanya',
		1217 => 'Noto Sans Pahawh Hmong',
		1218 => 'Noto Sans Palmyrene',
		1219 => 'Noto Sans Pau Cin Hau',
		1220 => 'Noto Sans Phags Pa',
		1221 => 'Noto Sans Phoenician',
		1222 => 'Noto Sans Psalter Pahlavi',
		1223 => 'Noto Sans Rejang',
		1224 => 'Noto Sans Runic',
		1225 => 'Noto Sans Samaritan',
		1226 => 'Noto Sans Saurashtra',
		1227 => 'Noto Sans Sharada',
		1228 => 'Noto Sans Shavian',
		1229 => 'Noto Sans Siddham',
		1230 => 'Noto Sans Sinhala',
		1231 => 'Noto Sans Sogdian',
		1232 => 'Noto Sans Sora Sompeng',
		1233 => 'Noto Sans Soyombo',
		1234 => 'Noto Sans Sundanese',
		1235 => 'Noto Sans Syloti Nagri',
		1236 => 'Noto Sans Symbols',
		1237 => 'Noto Sans Symbols 2',
		1238 => 'Noto Sans Syriac',
		1239 => 'Noto Sans Tagalog',
		1240 => 'Noto Sans Tagbanwa',
		1241 => 'Noto Sans Tai Le',
		1242 => 'Noto Sans Tai Tham',
		1243 => 'Noto Sans Tai Viet',
		1244 => 'Noto Sans Takri',
		1245 => 'Noto Sans Tamil',
		1246 => 'Noto Sans Tamil Supplement',
		1247 => 'Noto Sans Telugu',
		1248 => 'Noto Sans Thaana',
		1249 => 'Noto Sans Thai',
		1250 => 'Noto Sans Thai Looped',
		1251 => 'Noto Sans Tifinagh',
		1252 => 'Noto Sans Tirhuta',
		1253 => 'Noto Sans Ugaritic',
		1254 => 'Noto Sans Vai',
		1255 => 'Noto Sans Wancho',
		1256 => 'Noto Sans Warang Citi',
		1257 => 'Noto Sans Yi',
		1258 => 'Noto Sans Zanabazar Square',
		1259 => 'Noto Serif Ahom',
		1260 => 'Noto Serif Armenian',
		1261 => 'Noto Serif Balinese',
		1262 => 'Noto Serif Bengali',
		1263 => 'Noto Serif Devanagari',
		1264 => 'Noto Serif Display',
		1265 => 'Noto Serif Dogra',
		1266 => 'Noto Serif Ethiopic',
		1267 => 'Noto Serif Georgian',
		1268 => 'Noto Serif Grantha',
		1269 => 'Noto Serif Gujarati',
		1270 => 'Noto Serif Gurmukhi',
		1271 => 'Noto Serif Hebrew',
		1272 => 'Noto Serif Kannada',
		1273 => 'Noto Serif Khmer',
		1274 => 'Noto Serif Lao',
		1275 => 'Noto Serif Malayalam',
		1276 => 'Noto Serif Myanmar',
		1277 => 'Noto Serif Nyiakeng Puachue Hmong',
		1278 => 'Noto Serif Sinhala',
		1279 => 'Noto Serif Tamil',
		1280 => 'Noto Serif Tangut',
		1281 => 'Noto Serif Telugu',
		1282 => 'Noto Serif Thai',
		1283 => 'Noto Serif Tibetan',
		1284 => 'Noto Serif Yezidi',
		1285 => 'Noto Traditional Nushu',
		1286 => 'Odibee Sans',
		1287 => 'Oi',
		1288 => 'Ole',
		1289 => 'Oooh Baby',
		1290 => 'Orelega One',
		1291 => 'Otomanopee One',
		1292 => 'Outfit',
		1293 => 'Oxanium',
		1294 => 'Palette Mosaic',
		1295 => 'Passions Conflict',
		1296 => 'Petemoss',
		1297 => 'Piazzolla',
		1298 => 'Potta One',
		1299 => 'Praise',
		1300 => 'Public Sans',
		1301 => 'Puppies Play',
		1302 => 'Qahiri',
		1303 => 'Qwitcher Grypen',
		1304 => 'Rampart One',
		1305 => 'Readex Pro',
		1306 => 'Recursive',
		1307 => 'Red Hat Mono',
		1308 => 'Red Rose',
		1309 => 'Redacted',
		1310 => 'Redacted Script',
		1311 => 'Reggae One',
		1312 => 'Road Rage',
		1313 => 'Rock 3D',
		1314 => 'RocknRoll One',
		1315 => 'Rowdies',
		1316 => 'Rubik Beastly',
		1317 => 'STIX Two Text',
		1318 => 'Sansita Swashed',
		1319 => 'Sassy Frass',
		1320 => 'Scheherazade New',
		1321 => 'Sen',
		1322 => 'Shalimar',
		1323 => 'Shippori Antique',
		1324 => 'Shippori Antique B1',
		1325 => 'Shippori Mincho',
		1326 => 'Shippori Mincho B1',
		1327 => 'Shizuru',
		1328 => 'Smooch',
		1329 => 'Solway',
		1330 => 'Sora',
		1331 => 'Source Sans 3',
		1332 => 'Source Serif 4',
		1333 => 'Space Grotesk',
		1334 => 'Spartan',
		1335 => 'Spline Sans',
		1336 => 'Stick',
		1337 => 'Stick No Bills',
		1338 => 'Style Script',
		1339 => 'Sulphur Point',
		1340 => 'Syne',
		1341 => 'Syne Mono',
		1342 => 'Syne Tactile',
		1343 => 'Texturina',
		1344 => 'The Nautigal',
		1345 => 'Tomorrow',
		1346 => 'Tourney',
		1347 => 'Train One',
		1348 => 'Trispace',
		1349 => 'Truculenta',
		1350 => 'Turret Road',
		1351 => 'Twinkle Star',
		1352 => 'Uchen',
		1353 => 'Urbanist',
		1354 => 'Varta',
		1355 => 'Viaoda Libre',
		1356 => 'Vibes',
		1357 => 'Vujahday Script',
		1358 => 'Waterfall',
		1359 => 'WindSong',
		1360 => 'Xanh Mono',
		1361 => 'Yaldevi',
		1362 => 'Yomogi',
		1363 => 'Yuji Boku',
		1364 => 'Yuji Hentaigana Akari',
		1365 => 'Yuji Hentaigana Akebono',
		1366 => 'Yuji Mai',
		1367 => 'Yuji Syuku',
		1368 => 'Yusei Magic',
		1369 => 'Zen Antique',
		1370 => 'Zen Antique Soft',
		1371 => 'Zen Dots',
		1372 => 'Zen Kaku Gothic Antique',
		1373 => 'Zen Kaku Gothic New',
		1374 => 'Zen Kurenaido',
		1375 => 'Zen Loop',
		1376 => 'Zen Maru Gothic',
		1377 => 'Zen Old Mincho',
		1378 => 'Zen Tokyo Zoo',
    );


	/**
	 * returns block font params
	 */
	static function get_block_font_params() {
		return array(
			array(
	            'param_name' => 'font_family',
	            'type' => 'dropdown-responsive',
	            'value' => td_util::get_font_family_list(),
	            'heading' => '',
	            'description' => 'Font family',
				"class" => "tdc-font-dropdown tdc-font-family",
	        ),
	        array(
	            'param_name' => 'font_size',
	            'type' => 'textfield-responsive',
	            'value' => '',
	            'heading' => '',
	            'description' => 'Font size',
	            "class" => "tdc-font-textfield tdc-font-size",
	            'placeholder' => '-',
	        ),
			array(
	            'param_name' => 'font_line_height',
	            'type' => 'textfield-responsive',
	            'value' => '',
	            'heading' => '',
	            'description' => 'Line height (Use with px or a number that will be multiplied with the current font-size)',
				"class" => "tdc-font-textfield tdc-font-line-height",
	            'placeholder' => '-',
	        ),
			array(
	            'param_name' => 'font_style',
	            'type' => 'dropdown-responsive',
	            'value' => td_util::get_font_style_list(),
	            'heading' => '',
	            'description' => 'Font style',
				"class" => "tdc-font-dropdown tdc-font-style",
	        ),
			array(
	            'param_name' => 'font_weight',
	            'type' => 'dropdown-responsive',
	            'value' => td_util::get_font_weight_list(),
	            'heading' => '',
	            'description' => 'Font weight',
				"class" => "tdc-font-dropdown tdc-font-weight",
	        ),
			array(
	            'param_name' => 'font_transform',
	            'type' => 'dropdown-responsive',
	            'value' => td_util::get_font_transform_list(),
	            'heading' => '',
	            'description' => 'Font transform',
				"class" => "tdc-font-dropdown tdc-font-transform",
	        ),
			array(
				'param_name' => 'font_spacing',
				'type' => 'textfield-responsive',
				'value' => '',
				'heading' => '',
				'description' => 'Font spacing',
				"class" => "tdc-font-textfield tdc-font-spacing",
				'placeholder' => '-',
			),
			array(
				"param_name" => '',
				"type" => 'clearfix',
				'heading' => '',
				"value" => '',
				"class" => '',
			),
		);
	}


    // returns the font family for css generator
    public static function css_get_font_family($css_array) {

    	$td_options = td_options::get_all();

        if( !empty( $css_array['font_family'] ) ) {
            $explode_font_family = explode('_', $css_array['font_family']);

            $font_id = $explode_font_family[1];

            switch ( $explode_font_family[0] ) {
                // fonts from files (links to files)
                case 'file':
                    $css_array['font_family'] = stripcslashes( $td_options['td_fonts_user_inserted']['font_family_' . $font_id] );
                    break;

                // fonts from type kit
                case 'tk':
                    $css_array['font_family'] = stripcslashes( $td_options['td_fonts_user_inserted']['type_kit_font_family_' . $font_id] );
                    break;

                // fonts from font stacks
                case 'fs':
                    $css_array['font_family'] = self::$font_stack_list['fs_' . $font_id];
                    break;

                // fonts from google
                case 'g':
                    $google_font_name = trim(self::$font_names_google_list[$font_id]);

                    // search for space in google font names
                    if( preg_match('/\s/', $google_font_name ) ) {
                        $google_font_name  = '"' . $google_font_name . '"';
                    }

                    $css_array['font_family'] = $google_font_name;
                    break;
            }
        }

        return $css_array;
    }


    /**
     * add the typography css to the theme generated css
     *
     * used in : @see td_css_generator.php
     */
    public static function td_get_typography_sections_from_db($td_fonts_db_option_name = 'td_fonts') {

	    $td_options = td_options::get_all();
        $typography_sections_css_array = array();
	    $typography_settings_list = ( $td_fonts_db_option_name == 'td_fonts_mob' ) ? td_global_mob::$typography_settings_list : td_global::$typography_settings_list;

        foreach ( $typography_settings_list as $panel_section => $font_settings_array ) {
            foreach($font_settings_array as $font_setting_id => $font_setting_name) {

                //store $typography section array in a variable
                if(!empty($td_options[$td_fonts_db_option_name][$font_setting_id])) {
                    $section_css = $td_options[$td_fonts_db_option_name][$font_setting_id];
                    /**
                     * replace the font family in this section
                     * - in database the font family is stored like g_xxx for google, tk_x for typekit, fs_x for font stacks, where x are integers
                     *   and here we replace with their css corespondent
                     */
                    if(!empty($section_css['font_family'])) {
                        $section_css = self::css_get_font_family($section_css);
                    }

                    $typography_sections_css_array[$font_setting_id] = $section_css;
                }
            }
        }



        if(!empty($typography_sections_css_array)) {
            return $typography_sections_css_array;
        } else {
            return false;
        }
    }


    /**
     * add td_fonts_css_buffer from database into the source of the page
     *
     * td_fonts_css_buffer : used to store the css generated for custom font files in the database
     *
     * used in : @see td_css_generator.php
     */
    public static function td_add_fonts_css_buffer() {
        $td_fonts_css_buffer = td_util::get_option('td_fonts_css_buffer');

        if(!empty($td_fonts_css_buffer)) {
            return $td_fonts_css_buffer . "\n";
        } else {
            return '';
        }
    }


    /**
     * Generate the google font family and font width string: ex: ABeeZee:400,700|Abel:400,700
     * NOTE: it also applies the default font family's from @see td_config @see td_global::$default_google_fonts_list
     *          - on the default font widths it will also add the global panel font width settings
     *          - 400 font width is hardcoded because if a font has only 400 the font will not load for other widths if 400 is missing
     * @param $fonts_ids_array - array of google fonts IDs from td_fonts::$font_names_google_list
     * @return string - font string for google ABeeZee:400,700|Abel:400,700
     * @since 6.1.2017
     */
    static function get_google_fonts_names($fonts_ids_array) {

        $td_options = td_options::get_all();

        //check the character set saved in the database
        $array_google_font_styles = array(
            'g_100_thin',
            'g_100_thin_italic',
            'g_200_extra_light',
            'g_200_extra_light_italic',
            'g_300_light',
            'g_300_light_italic',
            'g_400_normal_italic',
            'g_500_medium',
            'g_500_medium_italic',
            'g_600_semi_bold',
            'g_600_semi_bold_italic',
            'g_700_bold',
            'g_700_bold_italic',
            'g_800_extra_bold',
            'g_800_extra_bold_italic',
            'g_900_black',
            'g_900_black_italic'
        );


        $tmp_google_font_styles_array = array();
        foreach($array_google_font_styles as $val_font_style ) {
            if(!empty($td_options['td_fonts_user_inserted'][$val_font_style])) {
                $tmp_google_font_styles_array[] = $td_options['td_fonts_user_inserted'][$val_font_style];
            }
        }

        $theme_width_settings = array (
            400 // ramane default
        );

        //merge the panel font settings
        $theme_width_settings = array_merge($theme_width_settings, $tmp_google_font_styles_array);

        $load_ids_array = array();


        // 1. make our ids array from the theme panel settings
        if(!empty($fonts_ids_array)) {
            foreach($fonts_ids_array as $g_font_id) {
                $load_ids_array[$g_font_id] = $theme_width_settings;
            }
        }


        // 2. marge the default font list with the list from the panel
        if (!empty(td_global::$default_google_fonts_list)) {
            foreach (td_global::$default_google_fonts_list  as $default_g_font_id => $default_g_font_widths_array) {
                $load_ids_array[$default_g_font_id] = array_unique(array_merge($default_g_font_widths_array, $theme_width_settings));
            }
        }



        // 3. render the font id array to string...
        $tmp_google_font_family = ''; // ex: ABeeZee:400,700|Abel:400,700 (it holds the width and style too)
        foreach($load_ids_array as $g_font_id => $g_font_widths_array) {
            $font_id = str_replace('g_', '', $g_font_id);
            if(!empty($tmp_google_font_family)) {
                $tmp_google_font_family .= '|';
            }
            $tmp_google_font_family .= str_replace(' ', '+', td_fonts::$font_names_google_list[$font_id]) . ':' . implode(',', $g_font_widths_array);
        }


        //print_r($tmp_google_font_family);
        return $tmp_google_font_family;
    }


    static function get_google_fonts_for_url($google_fonts) {

    	//var_dump($google_fonts);
    	//die;

    	$google_fonts_names = '';
	    $tdc_wm_global_fonts = td_util::get_option('tdc_wm_global_fonts' );

    	foreach ( $google_fonts as $google_fonts_id => $font_weights ) {

	    	if ( 'DEFAULT' !== $google_fonts_id ) {

			    $font_value = '';

			    if ( strpos( $google_fonts_id, '_global' ) !== false ) {
				    $font_setting_option_id = str_replace( '_global', '', $google_fonts_id );

				    if ( !empty( $tdc_wm_global_fonts ) && is_array( $tdc_wm_global_fonts ) ) {
					    foreach ( $tdc_wm_global_fonts as $font_option_id => $font_data ) {

						    if ( $font_option_id === $font_setting_option_id ) {
							    $google_fonts_id = $font_data['key'];
						    }

					    }
				    }

			    }

			    if ( ! empty( td_fonts::$font_names_google_list[ $google_fonts_id ] ) ) {
				    $font_value .= td_fonts::$font_names_google_list[ $google_fonts_id ];

				    $final_font_weights = '';
				    if ( is_array( $font_weights ) ) {
					    $font_weights[] = '400';
					    $font_weights = array_unique( $font_weights );

					    foreach ( $font_weights as $font_weight ) {
						    if ( ! empty( $font_weight ) ) {
							    if ( ! empty( $final_font_weights ) ) {
								    $final_font_weights .= ',';
							    }
							    $final_font_weights .= $font_weight;
						    }
					    }

					    if ( ! empty( $final_font_weights ) ) {
						    $font_value .= ':' . $final_font_weights;
					    } else if ( ! empty( $font_value ) ) {
						    $font_value .= ':400';
					    }

					    if ( ! empty( $font_value ) ) {
						    if ( ! empty( $google_fonts_names ) ) {
							    $google_fonts_names .= '|';
						    }
						    $google_fonts_names .= $font_value;
					    }

				    }
			    }
		    }
	    }

	    return $google_fonts_names;
    }



    /**
     * reads the google fonts subset from the database and makes it a string for the URL
     * @return string
     */
    static function get_google_fonts_subset_query() {

	    $td_options = td_options::get_all();


        //check the character set saved in the database
        $array_google_char_set = array(
            'g_arabic',
            'g_bengali',
            'g_cyrillic',
            'g_cyrillic-ext',
            'g_devanagari',
            'g_greek',
            'g_greek-ext',
            'g_gujarati',
            'g_hebrew',
            'g_khmer',
            'g_latin',
            'g_latin-ext',
            'g_tamil',
            'g_telugu',
            'g_thai',
            'g_vietnamese'
        );

        $tmp_google_subset = '';
        foreach($array_google_char_set as $val_charset) {
            if(!empty($td_options['td_fonts_user_inserted'][$val_charset])) {
                if (empty($tmp_google_subset)) {
                    $tmp_google_subset = $td_options['td_fonts_user_inserted'][$val_charset];
                } else {
                    $tmp_google_subset .= ',' . $td_options['td_fonts_user_inserted'][$val_charset];
                }

            }
        }

        if(!empty($tmp_google_subset)) {
            return '&subset=' . $tmp_google_subset;
        }

        return '';
    }
}//end class









/**
 * adds the javascript to be used when user ads typekit fonts
 *
 * td_fonts_js_buffer : holds the typekit javascript in the database
 */
function td_add_js_typekit() {
    $td_fonts_js_buffer = stripcslashes(td_util::get_option('td_fonts_js_buffer'));

    if(!empty($td_fonts_js_buffer)) {
        echo '<!-- typekit fonts -->' . $td_fonts_js_buffer;
    }
}
//add the js to the footer
add_action('wp_footer', 'td_add_js_typekit', 100);


/**
 * Insert style in Tiny MCE in admin post page
 * /
function my_admin_footer_function() {
    $screen_arr = get_current_screen();
    //print_r($screen_arr);

    //run only on admin post page
    if($screen_arr->post_type == 'post') {

        //get the typography generated css from database
        $td_typography_generated_css = td_util::get_option('tds_user_compile_css');
        if(!empty($td_typography_generated_css)) {
            //$td_typography_generated_css = '<style>' . $td_typography_generated_css . '</style>';
            echo '<script>
                    jQuery().ready(function() {
                        td_tmce_post_page_font_insertion();
                    });

                    /* insert the typography generated css into Tiny MCE editor * /
                    function td_tmce_post_page_font_insertion() {

                        /* wait for a second for Tine MCE to insert the iframe * /
                        var tmce_post_page_font = setTimeout(function(){
                            if(document.getElementById("content_ifr")) {
                                //console.log("iframe gasit");
                                jQuery("#content_ifr").contents().find("body").addClass("td-post-content");

                                jQuery("#content_ifr").contents().find("head").append(\'<style>.td-post-content {color:#ff0000 !important;font-size:13px;line-height:13px;font-style:italic;font-weight:bold;text-transform:uppercase;}</style>\');
                            } else {
                                //console.log("iframe nu este gasit");
                                clearTimeout(tmce_post_page_font);

                                //call the function again
                                td_tmce_post_page_font_insertion();
                            }
                        }, 1000);
                    }
                  </script>';
        }
    }
}
add_action('admin_footer', 'my_admin_footer_function');*/
