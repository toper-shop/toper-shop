$(function() {
    var ActivationList = [
      "Steam",
      "Origin",
      "Uplay",
      "Xbox",
      "PSN",
      "Battle.net",
      "Уточняется"
    ];
    $("#activation").autocomplete({
      source: ActivationList
    });
  });

$(function() {
    var PublisherList = [
      "1C Company",
      "1C-777",
      "1C-SoftClub",
      "1C-СофтКлаб",
      "1С-СофтКлаб",
      "2D BOY",
      "2K Games",
      "2K Sports",
      "505 Games",
      "800 North and Digital Ranch",
      "ACE Team",
      "Ackk Studios",
      "Activision",
      "Agharta Studio",
      "Alastair John Jack",
      "Aleksey Abramenko",
      "Alien Shooter",
      "Alientrap Games Inc",
      "AlwaysGeeky Games",
      "Amanita Design",
      "Angry Mob Games",
      "Arachnid Games",
      "Arcen Games",
      "Arcen Games, LLC",
      "Artifex Mundi sp. z o.o.",
      "Artifice Studio",
      "ATLUS",
      "Axis Game Factory",
      "Bandai Namco Games",
      "Battlegoat Studios",
      "Beatnik Games",
      "Benjamin Rivers",
      "Bethesda Softworks",
      "Big Sandwich Games",
      "BigSims.com",
      "Bitbox S.L.",
      "bitComposer Games",
      "bitSmith Games",
      "Black Market Games",
      "Black Pants Studio",
      "Blazing Griffin Ltd.",
      "Blind Mind Studios",
      "Blizzard Entertaiment",
      "Blizzard Entertainment",
      "Bohemia Interactive",
      "Bossa Studios",
      "Brawsome",
      "Broken Rules",
      "Buka Entertainment",
      "Capcom",
      "CCP Games",
      "CD Projekt RED",
      "Chaosoft Games",
      "CI Games",
      "CINEMAX, s.r.o.",
      "City Interactive",
      "Cliffhanger Productions",
      "Codemasters",
      "Coffee Stain Studios",
      "Cosmi",
      "Crescent Moon Games",
      "Croteam",
      "Daedalic Entertainment",
      "Dark Energy Digital Ltd.",
      "Dark Vale Games LLC",
      "DarkGod",
      "Dead Mage",
      "Deep Silver",
      "Degica",
      "Devolver Digital",
      "Devolver Digital and Croteam",
      "Digerati Distribution",
      "Digital Eel",
      "Digital Extremes",
      "Digital Tribe",
      "Dischan Media",
      "DnS Development",
      "Doppler Interactive",
      "Double Eleven",
      "Double Fine Productions",
      "EA Sports",
      "Eden Games",
      "Eden Studios",
      "Eidos Entertainment",
      "Eidos Interactive",
      "eigoMANGA",
      "Electronic Arts",
      "Encore, Viva Media",
      "Endless Loop Studios",
      "Enlight Entertainment Europe Ltd.",
      "Epic Games, Inc.",
      "Evolved Games",
      "Exor Studios",
      "Exosyphen studios",
      "Firebrand Games",
      "Focus Home Interactive",
      "Forever Entertainment S. A.",
      "Freebird Games",
      "Frictional Games",
      "Frontier",
      "Frozenbyte",
      "Futuremark",
      "Gaijin Entertainment",
      "Galactic Cafe",
      "Game Factory Interactive",
      "Giant Army",
      "Goodhustle Studios",
      "GSC Game World",
      "GSC World Publishing",
      "Hammerpoint Interactive",
      "Hashbang Games",
      "Hassey Enterprises, Inc.",
      "HD Publishing",
      "Headup Games",
      "HeroCraft, Ltd.",
      "Hinterland Studio Inc.",
      "Horberg Productions",
      "Human Head Studios",
      "Iceberg Interactive",
      "id Software",
      "Immanitas Entertainment",
      "increpare games",
      "IndiePub",
      "Instinct Software Ltd.",
      "Interplay Inc.",
      "Introversion Software",
      "Iocaine Studios",
      "ISOTX",
      "Jagex",
      "Kalypso Media Digital",
      "KinifiGames LLC",
      "KISS ltd",
      "Klei Entertainment",
      "Konami Digital Entertainment",
      "KranX Productions",
      "Kreatoriet AB",
      "Krystian Majewski",
      "Lace Mamba Digital",
      "Larian Studios",
      "Legacy Games",
      "Libredia",
      "Lonely Troops",
      "LucasArts",
      "Lucky Frame",
      "Ludochip",
      "LudoCraft Ltd.",
      "Lupus Studios",
      "Makivision Games",
      "Matthew Brown",
      "Matthew C Cohen",
      "Merge Games",
      "Meridian4",
      "Microsoft",
      "Microsoft Games Studios",
      "Microsoft Studios",
      "Midnight City",
      "Might and Delight",
      "Mighty Rabbit Studios",
      "Mike Bithell",
      "Milkstone Studios",
      "MinMax Games Ltd.",
      "Misfits Attic",
      "Mojang AB",
      "MumboJumbo",
      "Muse Games",
      "Mystic Box",
      "N3V Games",
      "NAMCO",
      "Namco Bandai Games",
      "NCsoft",
      "ND Games",
      "Neko Entertainment",
      "Nemesys Games",
      "Nemoria Entertainment",
      "NeocoreGames",
      "Nicolas Games",
      "Night Dive Studios",
      "Nimbly Games",
      "Nival",
      "Nordic Games",
      "Oovee® Game Studios",
      "OP Productions",
      "ORiGO GAMES",
      "Owlchemy Labs",
      "Panic Art Studios",
      "Pantera Entertainment",
      "Paradox Interactive",
      "Party of Sin",
      "Petroglyph",
      "Phoenix Online Studios",
      "Phr00t's Software",
      "Playdead",
      "Playrix Entertainment",
      "Playway",
      "PlayWay S.A.",
      "Plug In Digital",
      "Plug In Digital, Bigben Interactive",
      "PomPom Games",
      "PopCap Games, Inc.",
      "Positech",
      "Rake in Grass",
      "Ranmantaru Games",
      "Re-Logic",
      "Rebellion",
      "Recoil Games",
      "Red Barrels",
      "Relentless Software",
      "Remedy Entertainment",
      "Replay Games, Inc",
      "Reptile Games",
      "Reverb Publishing",
      "Reverie World Studios, INC",
      "Revolution Software Ltd",
      "Ripstone",
      "Rising Star Games",
      "Robot Entertainment",
      "Rocket Jump",
      "Rockstar Games",
      "Rockstar Games ",
      "Roman Syrovatka",
      "Rondomedia Marketing & Vertriebs GmbH",
      "Ronimo Games",
      "Rovio Entertainment Ltd",
      "RuneStorm",
      "Running With Scissors",
      "Saibot Studios",
      "Sakari Indie",
      "SCEE",
      "Screen 7",
      "SCS Software",
      "Seaven Studio",
      "SEGA",
      "Semanoor",
      "SGS Software",
      "ShadowShifters",
      "Shorebound Studios",
      "Shovsoft",
      "Sigma Team Inc.",
      "Silver Dollar Games",
      "SimBin",
      "Simos Mediacom",
      "Size Five Games",
      "Skygoblin",
      "Smudged Cat Games Ltd",
      "Sony",
      "Sony Online Entertainment",
      "Sos Mikolaj Kaminski",
      "South East Games",
      "SouthPeak Games",
      "Spicyhorse Games",
      "SQUARE ENIX",
      "SQUARE ENIX, Eidos Interactive",
      "Stainless Games Ltd",
      "Stardock Entertainment",
      "State of Play Games",
      "STEAMBUY",
      "Stickmen Studios",
      "Strategy First",
      "Subset Games",
      "Sumom Games",
      "SuperVillain Studios",
      "Team Meat",
      "Techland",
      "Telltale Games",
      "Teotl Studios",
      "The Behemoth",
      "The Binary Mill",
      "Thechineseroom",
      "THQ",
      "Three Gates",
      "tinyBuild",
      "Tomorrow Corporation",
      "Topware Interactive",
      "Torn Banner Studios",
      "Transhuman",
      "Trapdoor",
      "Trion Worlds",
      "Triple.B.Titles",
      "Tripwire Interactive",
      "Uber Entertainment",
      "Ubisoft",
      "UIE GmbH",
      "Unbound Creations LLC",
      "Unigine Corp.",
      "United Independent",
      "Unknown Worlds Entertainment",
      "Vae Victis Games",
      "Valve",
      "Viva Media Inc",
      "Wales Interactive",
      "Warner Bros. IE",
      "Warner Bros. IE",
      "WB Games",
      "White Giant RPG Studios",
      "WXP Games, LLC",
      "XeniosVision",
      "Zachtronics Industries",
      "Zaxis Games",
      "Zero Point Software",
      "Zooloretto",
      "Акелла",
      "Бука",
      "Новый Диск",
      "Уточняется"
    ];
    $("#publisher").autocomplete({
      source: PublisherList
    });
  });

$(function() {
    var PlatformList = [
      "windows",
      "linux",
      "mac",
      "playstation 4",
      "playstation 3",
      "xbox one",
      "xbox 360"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $("#platform")
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          response( $.ui.autocomplete.filter(
            PlatformList, extractLast( request.term ) ) );
        },
        focus: function() {
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          terms.pop();
          terms.push( ui.item.value );
          terms.push( "" );
          this.value = terms.join( "," );
          return false;
        }
      });
  });

$(function() {
    var LangList = [
      "русский",
      "английский",
      "немецкий",
      "французский",
      "итальянский",
      "испанский",
      "чешский",
      "датский",
      "финский",
      "японский",
      "корейский",
      "норвежский",
      "польский",
      "португальский",
      "румынский",
      "упрощенный китайский",
      "шведский",
      "традиционный китайский",
      "турецкий",
      "бразильский португальский",
      "украинский"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $("#lang")
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          response( $.ui.autocomplete.filter(
            LangList, extractLast( request.term ) ) );
        },
        focus: function() {
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          terms.pop();
          terms.push( ui.item.value );
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });

$(function() {
    $( "#release_date" ).datepicker({ dateFormat: 'dd.mm.yy' });
  });