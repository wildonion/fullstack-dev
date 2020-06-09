<?php

namespace App\Helpers;

class FilterString {

    public static function censor($string){
            if ($string)
            {
                //badwordsarray
                $badwords = array('fuck', 'shit', 'asshole', 'cunt', 'fag', 'fuk', 'fck', 
                                  'fcuk', 'assfuck', 'assfucker', 'fucker','motherfucker', 
                                  'asscock', 'asshead','asslicker', 'asslick', 'assnigger', 
                                  'nigger', 'asssucker', 'bastard', 'bitch', 'bitchtits',
                                  'bitches', 'bitch', 'brotherfucker', 'bullshit', 'bumblefuck', 
                                  'buttfucka', 'fucka', 'buttfucker', 'buttfucka', 'fagbag', 'fagfucker',
                                  'faggit', 'faggot', 'faggotcock', 'fagtard', 'fatass', 'fuckoff', 
                                  'fuckstick', 'fucktard', 'fuckwad', 'fuckwit', 'dick',
                                  'dickfuck', 'dickhead', 'dickjuice', 'dickmilk', 'doochbag',
                                  'douchebag', 'douche', 'dickweed', 'dyke', 'dumbass', 'dumass',
                                  'fuckboy', 'fuckbag', 'gayass', 'gayfuck', 'gaylord', 'gaytard', 
                                  'nigga', 'niggers', 'niglet', 'paki', 'piss', 'prick', 'pussy',
                                  'poontang', 'poonany', 'porchmonkey','porch monkey', 'poon', 
                                  'queer', 'queerbait', 'queerhole', 'queef', 'renob', 'rimjob', 'ruski',
                                  'sandnigger', 'sand nigger', 'schlong', 'shitass', 'shitbag', 
                                  'shitbagger', 'shitbreath', 'chinc', 'carpetmuncher', 'chink', 
                                  'choad', 'clitface', 'clusterfuck', 'cockass', 'cockbite', 
                                  'cockface', 'skank', 'skeet', 'skullfuck', 'slut', 'slutbag', 
                                  'splooge', 'twatlips', 'twat', 'twats', 'twatwaffle', 'vaj', 
                                  'vajayjay', 'va-j-j', 'wank', 'wankjob', 'wetback', 'whore', 
                                  'whorebag', 'whoreface', 'blowjob',
                                  'کس', 'کون', 'کیر', 'کونده', 'مادری', 'تخم',
                                  'مادر جنده', 'مادرتو گاییدم', 'مادر سگ', 'پدر سگ', 'تخم سگ',
                                  'گوه سگ', 'کیرم تو کونت', 'کیرم تو کست', 'خایه', 'میگامت', 'میگام',
                                  'خار کسه', 'لاشی', 'لاش به کون', 'کونده به لاش','ابجی کیر قاب زن',
                                  'فاحشه', 'مادر قهبه', 'مادر قهوه', 'کوس'
                                );
                //replacearray                      
                $replace =  array('f**k', 's**t', 'a**h**e', 'c**t', 'f*g', 'f*k', 'f*k', 'f**k', 
                                  'a**f***k', 'a**f****r', 'f****r', 'mother*****r', 'a**c**k', 
                                  'a**h**d', 'a**l***r', 'a**l**k', 'a**n****r', 'n****r', 'a**s****r', 
                                  'b*****d', 'b***h', 'b****t**s', 'b*****s', 'b***h', 'brotherf****r',
                                  'b***s**t', 'b*****f**k', 'b***f***a', 'f***a', 'b***f****r', 
                                  'b***f***a', 'f**b*g', 'f**f****r', 'f****t', 'f****t', 'f****tc**k', 
                                  'f**t**d', 'f**a*s', 'f***o*f', 'f***s***k', 'f***t**d', 'f***w*d', 
                                  'f***w*t', 'd**k', 'd***f**k', 'd***h**d', 'd***j***e', 'd***m**k', 
                                  'd****b*g', 'd*****b*g', 'd****e', 'd***w**d', 'd**e', 'd***a*s', 'd**a*s', 
                                  'f***b*y', 'f***b*g', 'g**a*s', 'g**f**k', 'g**l**d', 'g**t**d', 
                                  'n***a', 'n*****s', 'n**l*t', 'p**i', 'p**s', 'p***k', 'p****', 
                                  'p***t**g', 'p***a*y', 'p****m****y', 'p***h m****y', 'p**n', 
                                  'q***r', 'q***b**t', 'q***h**e', 'q***f', 'r***b', 'r**j*b', 'r***i', 
                                  's***n****r', 's**d n****r', 's*****g', 's***a*s', 's***b*g', 
                                  's***b****r', 's***b****h', 'c***c', 'c*****m*****r', 'c***k', 
                                  'c***d', 'c***f**e', 'c******f**k', 'c***a*s', 'c***b**e', 'c***f**e', 
                                  's***k', 's***t', 's****f**k', 's**t', 's***b*g', 's*****e','t***l**s', 
                                  't**t', 't***s','t***w****e','v*j','v*j**j*y','v*-*-j','w**k',
                                  'w*****b','w*****k','w***e','w****bag','w****face', 'b***j*b',
                                  'ک*', 'ک*ن', 'ک*ر', 'کو**ه', 'مادر*', 'ت*م', 'مادر ****', 'مادر** ******',
                                  'مادر **', 'پدر **', 'ت*م سگ', 'گ*ه سگ', 'ک*رم تو ک*ت', 'ک*رم تو ک*نت',
                                  'خا*ه', 'می**مت', 'می**م', 'خار ک**', 'لا*ی', 'لا* به کو*', 'کو**ده به لا*',
                                  'ابجی ک*ر قاب زن', 'فا**ه', 'مادر ق*ب*', 'مادر ق*و*', 'ک**'
                                  );    

                $newstring = str_ireplace($badwords, $replace, $string);
                return $newstring;
               }
        }
}