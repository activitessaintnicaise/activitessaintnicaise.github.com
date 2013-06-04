<?php

/*
		    Pagemap ImageWall Web Gallery
		    
		    Copyright by Pagemap Premium Portfolios. All Rights reserved.
		    http://getpagemap.com/pagemap-imagewall/
    
*/


// SCRIPT
			
			error_reporting(0);
			umask(0000);

			if(p_getMemoryLimit() < 5242880)
				ini_set('memory_limit', 33554432);
			
// SETTINGS
			
			global $set; if(empty($set)) $set = array();
			
			$set['script version'] = '1.2'; // Build 2010-08-24

			$set['script name'] = empty($set['script name']) ? $_SERVER['SCRIPT_NAME'] : $set['script name'];
			$set['script dir'] = empty($set['script dir']) ? './' : $set['script dir'];
			
			$set['cache dir'] = 'cache/';
			$set['config file'] = $set['script dir'] . 'config.txt';

			$set['fallback image size'] = 800;
			$set['color names'] = array('aliceblue' => '#f0f8ff', 'antiquewhite' => '#faebd7', 'aqua' => '#00ffff', 'aquamarine' => '#7fffd4', 'azure' => '#f0ffff', 'beige' => '#f5f5dc', 'bisque' => '#ffe4c4', 'black' => '#000000', 'blanchedalmond' => '#ffebcd', 'blue' => '#0000ff', 'blueviolet' => '#8a2be2', 'brown' => '#a52a2a', 'burlywood' =>  '#deb887', 'cadetblue' => '#5f9ea0', 'chartreuse' => '#7fff00', 'chocolate' => '#d2691e', 'coral' => '#ff7f50', 'cornflowerblue' => '#6495ed', 'cornsilk' => '#fff8dc', 'crimson' => '#dc143c', 'cyan' => '#00ffff', 'darkblue' => '#00008b', 'darkcyan' => '#008b8b', 'darkgoldenrod' => '#b8860b', 'darkgray' => '#a9a9a9', 'darkgreen' => '#006400', 'darkkhaki' => '#bdb76b', 'darkmagenta' => '#8b008b', 'darkolivegreen' => '#556b2f', 'darkorange' => '#ff8c00', 'darkorchid' => '#9932cc', 'darkred' => '#8b0000', 'darksalmon' => '#e9967a', 'darkseagreen' => '#8fbc8f', 'darkslateblue' => '#483d8b', 'darkslategray' => '#2f4f4f', 'darkturquoise' => '#00ced1', 'darkviolet' => '#9400d3', 'deeppink' => '#ff1493', 'deepskyblue' => '#00bfff', 'dimgray' => '#696969', 'dodgerblue' => '#1e90ff', 'firebrick' => '#b22222', 'floralwhite' => '#fffaf0', 'forestgreen' => '#228b22', 'fuchsia' => '#ff00ff', 'gainsboro' => '#dcdcdc', 'ghostwhite' => '#f8f8ff', 'gold' => '#ffd700', 'goldenrod' => '#daa520', 'gray' => '#808080', 'green' => '#008000', 'greenyellow' => '#adff2f', 'honeydew' => '#f0fff0', 'hotpink' => '#ff69b4', 'indianred ' => '#cd5c5c', 'indigo ' => '#4b0082', 'ivory' => '#fffff0', 'khaki' => '#f0e68c', 'lavender' => '#e6e6fa', 'lavenderblush' => '#fff0f5', 'lawngreen' => '#7cfc00', 'lemonchiffon' => '#fffacd', 'lightblue' => '#add8e6', 'lightcoral' => '#f08080', 'lightcyan' => '#e0ffff', 'lightgoldenrodyellow' => '#fafad2', 'lightgrey' => '#d3d3d3', 'lightgreen' => '#90ee90', 'lightpink' => '#ffb6c1', 'lightsalmon' => '#ffa07a', 'lightseagreen' => '#20b2aa', 'lightskyblue' => '#87cefa', 'lightslategray' => '#778899', 'lightsteelblue' => '#b0c4de', 'lightyellow' => '#ffffe0', 'lime' => '#00ff00', 'limegreen' => '#32cd32', 'linen' => '#faf0e6', 'magenta' => '#ff00ff', 'maroon' => '#800000', 'mediumaquamarine' => '#66cdaa', 'mediumblue' => '#0000cd', 'mediumorchid' => '#ba55d3', 'mediumpurple' => '#9370d8', 'mediumseagreen' => '#3cb371', 'mediumslateblue' => '#7b68ee', 'mediumspringgreen' => '#00fa9a', 'mediumturquoise' => '#48d1cc', 'mediumvioletred' => '#c71585', 'midnightblue' => '#191970', 'mintcream' => '#f5fffa', 'mistyrose' => '#ffe4e1', 'moccasin' => '#ffe4b5', 'navajowhite' => '#ffdead', 'navy' => '#000080', 'oldlace' => '#fdf5e6', 'olive' => '#808000', 'olivedrab' => '#6b8e23', 'orange' => '#ffa500', 'orangered' => '#ff4500', 'orchid' => '#da70d6', 'palegoldenrod' => '#eee8aa', 'palegreen' => '#98fb98', 'paleturquoise' => '#afeeee', 'palevioletred' => '#d87093', 'papayawhip' => '#ffefd5', 'peachpuff' => '#ffdab9', 'peru' => '#cd853f', 'pink' => '#ffc0cb', 'plum' => '#dda0dd', 'powderblue' => '#b0e0e6', 'purple' => '#800080', 'red' => '#ff0000', 'rosybrown' => '#bc8f8f', 'royalblue' => '#4169e1', 'saddlebrown' => '#8b4513', 'salmon' => '#fa8072', 'sandybrown' => '#f4a460', 'seagreen' =>  '#2e8b57', 'seashell' => '#fff5ee', 'sienna' => '#a0522d', 'silver' => '#c0c0c0', 'skyblue' => '#87ceeb', 'slateblue' => '#6a5acd', 'slategray' => '#708090', 'snow' => '#fffafa', 'springgreen' => '#00ff7f', 'steelblue' => '#4682b4', 'tan' => '#d2b48c', 'teal' => '#008080', 'thistle' => '#d8bfd8', 'tomato' => '#ff6347', 'turquoise' => '#40e0d0', 'violet' => '#ee82ee', 'wheat' => '#f5deb3', 'white' => '#ffffff', 'whitesmoke' => '#f5f5f5', 'yellow' => '#ffff00', 'yellowgreen' => '#9acd32');

			$set['image favicon'] = 'AAABAAEAICAAAAEAIACoEAAAFgAAACgAAAAgAAAAQAAAAAEAIAAAAAAAAAAAABMLAAATCwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADgAAACAAAAALQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAUAAAAewAAAIAAAAB4AAAADgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAAAGUAAACAAAAAgAAAAIAAAABNAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAvAAAAgAAAAIAAAACAAAAAgAAAAH4AAAAUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwAAAHEAAACAAAAAgAAAAIAAAACAAAAAgAAAAFEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB0AAAAdwAAAFkAAAA7AAAAGQAAAAAAAAA4AAAAgAAAAIAAAACAAAAAgAAA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AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABHAAAAfQAAAH0AAAB9AAAAZwAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAkAAAB0AAAAfQAAAHoAAAAWAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgAAAB9AAAAOwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADMAAAABAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//9////+P////B////gf///4D//98A///BAHn/wAAB/8AAAf/AAAP/4AAD/+AAA/+AAAD/AAAAPAAAABgAAAAAAAAACAAAADwAAAB/AAAB/8AAA//AAAP/wAAB/8AAAf/AAAH/gAAB/4cA8f//Af///4H///+D////x////+f/8=';
			$set['image blank'] = 'R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
			$set['image close'] = 'R0lGODlhLAAKAMQZAFVVVURERM/Pz+vr6+fn59ra2t3d3eTk5NPT0+7u7hEREfz8/IiIiCIiInd3d5mZmTMzM9bW1qqqqvj4+PX19eDg4PHx8QAAAMzMzP///wAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABkALAAAAAAsAAoAAAWpYCaOFjaNaKqqSROk0uWo5bnedxJcrxhfD5oJR1wBeJmfRETAYCKUWoYScR4yFoHzZHBCcUfI5bLMDDCDTGUgFRSw6EpkJF+oEcQjeWQwoGolFCIRFSUVglpOTjgYCmM9GQV+JCaBgxUiFRgJAgRFGY1kRz1NaQQEFJsLApglaSKsFQiCBRYroWWjIgdetJUIVhm8GLMLBV42KBhjZSJHAJ/ROAzNIwwGIQA7';
			$set['image next'] = 'R0lGODlhOQAcAMQYAO7u7ufn5/j4+Ovr6/Hx8fX19dPT093d3c/PzzMzM+Tk5Pz8/KqqqoiIiNra2kRERGZmZhEREeDg4NbW1u/v7wAAAMzMzP///////wAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABgALAAAAAA5ABwAAAWzIHaNZGmeaKqubOu+cCzPdG3feK7vfO//PwAwB0hYhi0CIgWoVBrIVeCIajofwprA4rBYAqOpBTEQGMAKA8VrkZyszghD275MFwND4TKwCAAWBxZ7U0xOhxUQNFsDFwR+gmwWBBcKX2FUb4iHCTOMjpAOJxOBmIabip4WjY8CfY0BYAF6CLJ+VYhydKy3lhYGBAWDF4AFC6SZJHBYUTJWUM3ORtE0WdTX2Nna29zdQyLeKyEAOw==';
			$set['image prev'] = 'R0lGODlhOQAcAMQXAO7u7uDg4Nra2s/Pz9PT0/z8/NbW1vj4+PX19efn5/Hx8d3d3evr6zMzM+Tk5GZmZhEREaqqqoiIiERERMzMzAAAAP///////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAABcALAAAAAA5ABwAAAXBoCWOZGmeaKpa1+q+cCzPdG3feK7vfO//wBIgqKM0hkSbpFJBJmWACbP5lEUgU2opQKBQDAiLYGGgHBRdiqNAUYgGidojy3SOuIWCgSAeIBAHFAwWCAMMAQEWCgMFNA10dSYBAiIAZmMiCV6bCYUFDg42c3R2IpOVFAUCiRaaJgIAAwc3V1mlFlwWegZirIGJCguVBMI4UVO3AQNeBrOrIwzLFHEiBG46S1okp1UqRsmU3Sq34uXm5+jp6uvs7TMXIQA7';
			$set['image loading'] = 'R0lGODlhIwAjAKUAAAQCBISChMTCxERCROTi5CQiJKSipPTy9BQSFGxubLSytJSSlAwKDNTW1Ozq7Dw+PPz6/Hx6fExKTCwqLKyqrBwaHLy+vJyanAQGBISGhMzKzERGROTm5PT29HR2dLS2tJSWlAwODNze3Ozu7Pz+/Hx+fCwuLKyurBweHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh+QQJBgAkACwAAAAAIwAjAAAGqECScEgsEiKoUEHi+RyK0Gi0kwBYr5hCpCHtQgmTq9iKCji8aJFpzH5o0F1IBINhiysWuHR0Miw8Awx2IQJ6cA4LKGwFXIZoHAl1YgNnjl4dCwhjJZZoECCSZI2dUlRjEaReDgViKE+pUiBiGB+we4JXHrZSA2Ibu1EercBQC2IMxEUfuFbJRGBXCM5DEBcmShnTQx0CJxYj2uHi4+Tl5ufo6err7O1RQQAh+QQJBgAlACwAAAAAIwAjAIUEAgSEgoREQkTEwsQkIiTk4uSsqqxkZmT08vQUEhQ0MjR0dnSUkpTU0tQMCgzs6uz8+vwsKiy8vrxsbmwcGhw8Ojx8fnycmpzc3twEBgSMjoxERkTMyszk5uS0srT09vR8enyUlpTU1tQMDgzs7uz8/vwsLix0cnQcHhw8PjwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGrsCScEgsFj+FBsLIbDo/DBMBBRI5r04PBcAFoAIPrHgY6JornLGYkTF3KRL1tXAYubmjgfz60KDuBFZ7Th0TbWYCYYNNEAx2ZhaLThAhh1wogpJGEBNuIJpNDwRmKEugRiFmGR6nRiQOZgutRgJmG7NFC6S4RAxmDrxDF27BQr5dwMWdXSjFJRW2xRARscUIJl2r0ieHBKbBBQsVAgbOQggYBR/m7O3u7/Dx8vNXQQAh+QQJBgAZACwAAAAAIwAjAIUEAgSMjoxEQkTMyswkIiTk5uRkZmSsrqwUEhTc2tw0MjT09vScmpxMTkx0dnQMCgzU0tTs7uy8vrwcGhw8OjyUlpRMSkwsKizk4uT8/vx8fnwEBgSUkpRERkTMzswkJiTs6uxsbmy0srQUFhTc3tw0NjT8+vycnpxUVlR8enwMDgzU1tT08vTEwsQcHhw8PjwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGq8CMcEgsGo/IpHLJbBJBJJZzmjEdGhTDgNqEEADgiYS7DIDPqhY5edqcwYTV+mhKud8C0Ny44CDeABp7RiYVd2AucoNECyGAKYtFIB9vLlKRQxVvGyKYQxEPbw6eQwJvHaRCDpWpGRxvD60MgK2vZ7GpjmcurRSnqRiAo6Qam52eCROVl5i6Z8OYIKa7ipgrF2+CpCAoZxQFqSYSFiMKW60ZBRDg6O3u7/BkQQAh+QQJBgAVACwAAAAAIwAjAIUEAgSMiozExsRERkTk5uQkIiSkpqRsbmwUEhT09vSUlpTU1tR8enwMCgzs7uw0NjS0srSUkpRUUlR0dnQcGhz8/vycnpzk4uS8urwEBgSMjozMysxMSkzs6uwsKix0cnT8+vycmpzc2tx8fnwMDgz08vQ8Pjy0trQcHhwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGqMCKcEgsGo/IpHLJbDqf0Kh06gRRmSIGJ9C5IgkSACAj6XqLGJJYPDoXBYg1gLJwD0EfOYBhH3YKciglfUIKchknhBUODXITihUDcgOQE4GQEXINkCF6mJqQB5eKD5OKFxmOiiOHEIQiFIGDdiUceo92CR+payh1biUHjXJtbiABvGsmBHYbKHoIG30Ww2IkGIQYcWII2IQOHxQkJtKQBBAGzJBCVutNQQAh+QQJBgAXACwAAAAAIwAjAIUEAgSMjozMysxERkS0srTk5uQkIiRsbmycnpwUEhT09vTc2tx8enwMCgyUlpRUVlTEwsTs7uykpqTU0tQ0NjR0dnQcGhz8/vwEBgSUkpRUUlS8urzs6ux0cnSkoqT8+vzk4uR8fnwMDgycmpxkYmTExsT08vSsqqzU1tQ8PjwcHhwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGpsCLcEgsGo/IpHLJbDqf0Kh0Sq1ar9hs9fPRFjme0AnkFZoeGACGYSpP0gBAglBWNOLxSvkywAMGexV+KnsZfg17I34AhYd7B4N7FH6AXiBweWUhfhh0WgsWg21ZJhqLelkKHYsqKFkRB3d+IVgfAn2LKQVXAiSYeAkCVgoIoYsAIhtXJ8aLCcpWH5DHKcJXHwyycRYhu1kQFBgYKhWuXh8lDgSjSUEAIfkECQYAFQAsAAAAACMAIwCFBAIEhIaEREZEzMrMJCIk5ObkrKqsZGZkFBIU9Pb0dHZ03NrcNDY0vLq8DAoMnJqcHBocZGJkLCos7O7sbG5s/P78fH585OLkxMLEBAYEjI6MVFJU1NbUtLK0FBYU/Pr8fHp83N7cPD48vL68DA4MnJ6cHB4cLC4s9PL0dHJ0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABqLAinBILBqPyKRyyWw6n9CodEqtWq/YrHbL7Xq/2E/ogvKiQCcJ5dLtOABwS7cEh5u6mjqA1E3p71wMegJcFxl6ClwWehkdWwsQf2VZKBt6AIlZCX5/HFkTFG96clcfAwKXACIFVh8YEYeXHgNSHxcPBwIeqXAkDVIJDxKxvAAev1IDEsV1IrRTBgjMEBasVCMEqRkmCp5WKAHSGQQCCh2TSUEAIfkECQYAFwAsAAAAACMAIwCFBAIEjI6MREZEzMrMJCIk5ObkZGZkFBYUrKqs3Nrc9Pb0dHZ0PD48vLq8DAoMXF5cLCos1NLU7O7sbG5sHB4ctLK05OLk/P78fH58BAYEVFJUJCYkHBocrK6s3N7c/Pr8fHp8xMLEDA4MZGJkLC4s1NbU9PL0dHJ0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABqPAi3BILBqPyKRyyWw6n9CodEqtWq/YrHbL7Xq/4LB4TOZaApiKyTtyAA4BhTkDqEMsXEy9zolsExx7ABRrWSYaggALWgoniRQlWRITboIgWB8DAokADAVNHxImckQfISN0iQcDTRYTJAQiDCMTBgIHnHUiDU0mC5W5uQe8TR4MwcEMrE4Wm8iCHBifTx8IFKm5GRQLkVMmFQsCFG4ZBAILaktBACH5BAkGABQALAAAAAAjACMAhQQCBJSSlERGRMzKzCQiJGRmZOTm5BQWFPT29LSytFRWVHR2dAwKDNza3DQyNOzu7Ly+vExOTGxubBweHPz+/FxeXDw+PAQGBKSipExKTNTW1Ozq7BwaHPz6/Ly6vHx+fAwODOTi5DQ2NPTy9MTCxHRydGRiZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAajQIpwSCwaj8ikcslsOp/QqHRKrVqv2Kx2y+16v+CweEwum89o5ijw8XS6owoAwMG8tYjSfG4x3I0hAw0ITQ8SDHsADg1IHhEEIgoJhEgdAwKJcxUjRxuYiRkJnEQdJCYXmQAHA0gaB6kAIBYmEgUZr7AgHkkbDrC/qQe7SZYWwMcWrEwGHxzHmRwfBlAaCxOovxcTCxpUIwkLAhOIFwQCC6JLQQAh+QQJBgAYACwAAAAAIwAjAIUEAgSEgoREQkTEwsRkYmTk5uQkIiQUEhSkoqRUVlTU1tR0cnT09vQMCgyUkpRMSkwcGhy0srTMysxsbmz08vQ8Pjzc3tx8fnz8/vycmpwEBgRERkRkZmTs6uwsLiwUFhSkpqRcWlzc2tx0dnT8+vwMDgxMTkwcHhy8urzMzsycnpwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGoUCMcEgsGo/IpHLJbDqf0Kh0Sq1ar9isdsvter/gsHhMLpvPXEsmEGF0RaEG4LMobEmIEmAPSHS0JBlyfAAPFk0UIBkiSQUVhHsebUkkEiYNDRUpSRIfkHsPERRFJAMEGnwaI0ooep8AJRUEExwPB68JJKyer72EGg6jShKPvr6GTQUXJ8aQEBd2TwojJ6i9GicjClQUESMbJ3IaBgIjoktBACH5BAkGACYALAAAAAAjACMAhQQCBJSWlERGRNTW1GRmZCQiJOzu7LSytBQWFFRWVOTi5HR2dMTCxPz6/AwKDKyurExOTDQyNLy6vJyenNze3GxubPT29BweHOzq7Hx+fAQGBExKTNza3GxqbCwuLPTy9LS2tBwaHGRiZOTm5Hx6fMzKzPz+/AwODFRSVDw+PLy+vKSipAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAajQJNwSCwaj8ikcslsOp/QqHRKrVqv2Kx2y+16v+CweCxsWL4N1aKz+nQZEQcAMWlwAxqAHiHhHvJ6ABB2Wh8XgXogXCSIAB4KWwMhjSgYWxmNghxaGCmZHgdnWCUImQAbB25EDRwqqk0SJ6YAJykiHR0CpRqVTxKls7MTUCWewZkZhE4jGYfHehoPyk8DCxeApickCtNQHwcLAhdyGgUCC6lLQQAh+QQJBgAWACwAAAAAIwAjAIUEAgSEhoRERkTMyswkIiRsbmzk5uQUEhSsqqxUVlT09vQ0MjS0trQMCgxMTkzc3tx8enzs7uwcGhycmpwsKixcXlz8/vy8vrwEBgRMSkzU1tR0dnTs6uwUFhS0srT8+vw8Pjy8urwMDgxUUlTk4uR8fnz08vQcHhykoqQsLixkYmQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGoECLcEgsGo/IpHLJbDqf0Kh0Sq1ar9isdsvterOmC2Kg8AYIh9Tk0+0A3pRH9/3GTLoYOqDSJehBbFsCeg1lWxB6AB5cHnl0DoZgJ3oYIVyIeikkWxoSiSMcWyWJAA5yWRwgpBQekVYDbqQZHiZYISKkbyIgKhAoEVQhsblvDRCuUAOqxG+aVQYlk8RxVxobJ456BbVYJh4bAicNJxsGT0EAIfkECQYAGgAsAAAAACMAIwCFBAIEjIqMREJEzMrMJCIkZGJk5ObkFBYUrKqsVFJUNDI0dHJ09Pb03NrctLa0DAoMTEpMLCos7O7sfHp81NLUbGpsHB4ctLK0XF5cPDo8/P785OLkBAYEjI6MREZEJCYk7OrsHBocrK6sVFZUdHZ0/Pr83N7cvLq8DA4MTE5MLC4s9PL0fH581NbUbG5sPD48AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABqdAjXBILBqPyKRyyWw6n9CodEqtWq9YaGljWmWNCIGCZPoOVx8AgFMpmTUXjhoQAb0nc4CF8fbkD25mBHkCbxpycwWGeQAVhohqGIaDcxmGfnMoXmZ4eRdvcXkpfF8rFnkcJ3eMKhtmLSGMCXZfLIwAKQ1fIBm3KhekVwMHtwAQDoFWJyjFAAK6VyfExQFZA723E18GLKdzByJvFCQWBCodwWYrFF1UQQAh+QQJBgAoACwAAAAAIwAjAIUEAgSkpqREQkTU1tQkIiRkYmT08vTEwsQUEhRUUlTk4uR0dnS0srQ0MjQMCgz8+vzMyswcGhw8OjxMTkzc3txsbmxcXlzs6ux8fny8urwEBgSsrqxERkTc2txkZmT09vTExsQUFhRUVlTk5uR8eny0trQ0NjQMDgz8/vzMzswcHhw8PjwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGrUCUcEgsGo/IpHLJbDqf0KgUeYFQHtPlwISQbLDZ40UAKAs64SOmXI6A0sWOig0wUeBEEh1gAeMNc2wOKXhDJRp0Hn54enRvhUIcdAgfkEIEdByWQohsBZsoexWgnWV9m5hsEqCSbCcGm41sDJsMpQATlZCAdBoZsXsNd5ADEXsJF5ZrexPDeBcSewASCpAQIdIYlhknewubGdhlKgegEAUrEwGLux3JoES68JtBACH5BAkGABkALAAAAAAjACMAhQQCBISGhERCRMTGxGRiZKSmpOTm5CQiJBQSFHRydPT29JyanFRSVLS2tNTW1AwKDOzu7BwaHHx6fIyOjExKTMzOzGxubLSytDw6PPz+/KSipFxaXLy+vAQGBIyKjERGRMzKzGRmZKyqrOzq7BQWFHR2dPz6/JyenNze3AwODPTy9BweHHx+fDw+PFxeXMTCxAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAazwIxwSCwaj8ikcrkcLSYVE3NKBLUeDwqKSuVEAODHQspVvhDgtKesdBzS4BWIjRwJ4OAAHcnCdxIQe0ZueCUKgkYSeB+BiEQqK3APFY5FDQ9wIWSVQopwA5xEH3AIh6FCb2kfp0MdcASsQngWsRmuaS6boalgGLWjaSkqsZ5pF7EXt2AUpqGQcB0cxHgYI6wOX3AasX1pHSKxIwwkAA8bBrUoGiUn6LUZELrv8u/19vf4REEAIfkECQYAKgAsAAAAACMAIwCFBAIEhIKEREJExMLEZGJk5OLkJCIkpKKkFBIUdHJ09PL0VFZU1NbUtLK0DAoMTEpMzMrMHBocfHp8/Pr8vLq8lJaUbG5s7OrsNDI0BAYEhIaEREZExMbEZGZkpKakFBYUdHZ09Pb0XF5c3N7ctLa0DA4MTE5MzM7MHB4cfH58/P78vL687O7sPD48AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABrRAlXBIVClIlUGoyGw6hQyJIZPBUJ7Y5iWAAngBGdAkS1ZBWt+0RVHGriLp78fTfg4QcS/qsKwzGQZ5JRIjfloCeSYMY4ZMAXEZCSyNTQxwaQl9lEUScRuTm0UKgV8OJ6FMDRlpHYyoQ51pHK9FG2kImrQqpF4bukSrXwS/Q3EWxELBXiKuurwALc20tqW5tLFfp8QNeF8ryAoSJWALbMgjDRoHF8hCE+/t8fLz9PX29/j5WUEAIfkECQYAKQAsAAAAACMAIwCFBAIEhIKEREJExMLEJCIk5OLkpKKkZGJkFBIU9PL01NbUtLK0dHJ0PDo8DAoMnJqcTEpMzMrMHBoc/Pr8vLq8jI6MLCos7OrsbG5sfHp8BAYEhIaEREZExMbErKqsZGZkFBYU9Pb03N7ctLa0PD48DA4MTE5MzM7MHB4c/P78vL68LC4s7O7sfH58AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABq7AlHBITCVGGQ6hBABtEsWotKjIEDSArBalmnqJlwBKS84iPN9vhFRuryLpqUrSJjssD2i8OEDUAQ0YFSMFIXtUBG0lGSITh1MXAm0mCo6PUwFlGgwsl14KdGQMhp5TGWUcnaVSCYlaDierUwtYWh+WskWnZB25UhxkCKS+RK5ZHMRRtVkHyUVjWgzORLsAGgbTQwUYFisZqtkpISIiw+Hn6Onq6+zt7u/w8fLz7EEAIfkECQYAKgAsAAAAACMAIwCFBAIEhIKExMLEREJE5OLkJCIkZGZkrKqs1NLUFBIU9PL0NDI0dHZ0lJKUDAoMzMrMTEpMtLa03Nrc/Pr87OrsLC4sbG5sHBocPDo8fH58nJ6cBAYEjI6MxMbEREZEJCYktLK01NbU9Pb0fHp8lJaUDA4MzM7MTE5MvL683N7c/P787O7sdHJ0HB4cPD48AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABqZAlXBIVCkiI0+hBCgVIIyIokitCiWjlgPA7XY3n8PEaqUELt502pUiUx8utby7aLuHKPRcvmFM7yoCCXMYFhwaDQwDFRUWdnchBWolDI9EEwpjgBQDaichgKEBaRssK6GAIXpdLCKogCNpHqevbgqSXQ4mtXcILV4GmrxWBBVeHcO2JGgbEMLJVSIgGRyW0NfY2drb3N3e3+Dh4uPk5ebn6Onq68lBACH5BAkGACgALAAAAAAjACMAhQQCBISChMTCxERCROTi5CQiJGxubLS2tPTy9BQSFJSSlFRWVNTW1AwKDIyKjExKTOzq7Dw6PHR2dPz6/MzKzBwaHJyenAQGBISGhERGROTm5CQmJHRydLy+vPT29JSWlFxaXNze3AwODIyOjExOTOzu7Dw+PHx6fPz+/MzOzBweHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAalQJRwSEQhDqdMQQQQFR6SA6JIrQoZp8IFwO12L4UTw2qFBFTetFoVgJCJFJN6ro5Q3qhOhc73btxWAgl0EQYOFgoSAw1qIgJWDAWNEiFVECNoXRGVVAgcaiRjbxoBJhsPBxNVIQNeFxwleEMQKQQeVRMlC14ct7K/KBMHGwAXC7HAwBMpDgrIydDR0tPU1dbX2Nna29zd3t/g4eLj5OXm5+jp6uBBACH5BAkGABcALAAAAAAjACMAhQQCBISChMTCxERCRCQiJOTm5KSipGRmZBQSFPT29JSSlNTW1FRWVLS2tHR2dAwKDDQyNOzu7BwaHJyanExKTKyqrGxubPz+/Nze3Dw6PAQGBIyOjMzKzERGROzq7GxqbBQWFPz6/JSWlNza3FxaXLy+vHx6fAwODPTy9BweHJyenKyurDw+PAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAagwItwSLygGqYO4QQ4ESiOBqpIrQpHptQDwO12NQTTwmr1BCTetDoV8JCJBYZ6rs5w3sLJls7ngkp4H3MZHxsqCg4De2kIAm8qiycOGFUeGylqBGNlFhIIDJtkBRYaaQNuVhECJQl4QiEKTF8GrrWvIrJNKiG2tSEVEBogB5S9tgsVJQXGzM3Oz9DR0tPU1dbX2Nna29zd3t/g4eLj5OXUQQAh+QQJBgAZACwAAAAAIwAjAIUEAgSEgoTEwsREQkQkIiTk5uSkpqRsbmwUEhT09vSUkpQ0MjTMzsy0trR8enwMCgxcXlzs7uyMjozMysxMSkwsKiy0srR0dnQcGhz8/vycnpw8OjwEBgSEhoTExsRERkQkJiTs6uysqqx0cnT8+vyUlpTU1tS8vrx8fnwMDgz08vQcHhw8PjwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGq8CMcEjMJBqODyEFSBEol4aqSK0OCw4mYMvdcggOk3UstDy66O4qECJTSYG0nLuZuIsiznyOOd2HIRAcHAsHEhoKFwNnaSkCf0IqDBFVIRIraQRikG4FB3pdA22cZCQKWlwopG4kJaBbK5urViQHaA6zZCEgalO5ViVdHA2/VrtcHCXFViIYAISPy1QJIiMoJyTSVgkk2drf4OHi4+Tl5ufo6err7O3u7/BDQQA7';
			$set['image overlay'] = 'R0lGODlhIAAgAJEAAAAAADMzMyEhIQAAACH5BAQUAP8ALAAAAAAgACAAAAJvTACGmtfrGBMCUVvB1Xn7DIXPKEUmhnLptwql+JKnSrN1hyPwHPeODczdfLviKNhK0oxEmQh5U1Ka1Bn0KmTytk8htlXVdqXess6JDkfXWLX6y86muXOyfUh3/8xxpbiOBteWRzjWd7jxp3cnKFAAADs=';
			
// GET CONFIG
			
			$config = array();

			$config['Author'] = '';
			$config['Gallery Title'] = 'My gallery';
			$config['Gallery Description'] = 'Pagemap ImageWall by Pagemap Premium Portfolios';

			$config['Thumbnail Cropped'] = 'on';
			$config['Thumbnail Quality'] = 80;
			$config['Thumbnail Size'] = 'normal';
			$config['Thumbnail Background'] = 'black';

			$config['Image Size'] = '';

			$config['Sort'] = 'normal';
			$config['Embedded Script'] = 'off';
			$config['jQuery Path'] = 'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js';

			$config['Header Image'] = '';
			$config['Background'] = 'white';
			$config['Footer Color'] = 'silver';
			$config['Custom CSS'] = '';
			$config['Custom HTML'] = '';

			$config['Home Page'] = '';
			$config['Contact'] = '';
			$config['Imprint'] = '';

			$config['Images Dir'] = '';
			$config['Images List'] = '';
			$config['Exclude Images'] = '';

// SET CONFIG
			
			if(is_file($set['config file']) && is_readable($set['config file'])) {
				// Get config from Config File
				$set['config file contents'] =  file_get_contents($set['config file']);
				preg_match_all("/\[(.*):(.*)\]/U", $set['config file contents'], $set['config file variables']);
				
				foreach($set['config file variables'][1] as $position => $variable) if(!empty($variable))
					$config[trim($variable)] = isset($set['config file variables'][2][$position]) ? trim($set['config file variables'][2][$position]) : '';
			} elseif(is_writeable($set['script dir'])) {
				// Create Config File if not exists
				$set['open config file'] = fopen($set['config file'], 'w');
				foreach($config as $variable => $value) fwrite($set['open config file'], '[' . $variable . ': ' . $value . ']' . "\r\n");
			}
			
// FUNCTIONS

			function p_encodeEmail($string) {
				$emails = array();
				preg_match_all('/\w[-._\w]*\w@\w[-._\w]*\w\.\w{2,6}/i', $string, $emails);
		
				foreach((array) $emails[0] as $email) {
					$encoded_string = '';
					$arrCharacters = str_split($email);
		
					foreach ($arrCharacters as $strCharacter)
						$encoded_string .= sprintf('&#%s;', ord($strCharacter));
		
					$string = str_replace($email, $encoded_string, $string);
				}
		
				return str_replace('mailto:', '&#109;&#97;&#105;&#108;&#116;&#111;&#58;', $string);
			}

			function p_addHTTP($url) {
				return !empty($url) && substr($url, 0, 7) != 'http://' ? 'http://' . $url : $url;
			}
			
			function p_getThumbnailSize($size) {
				switch($size) {
					case 'small' : $size = 90; break;
					case 'normal' : default : $size = 150; break;
					case 'large' : $size = 225; break;
				}
				
				return $size;
			}

			function p_html2rgb($color) {
				if($color[0] == '#') $color = substr($color, 1);
			    if(strlen($color) == 6) list($r, $g, $b) = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
				    elseif(strlen($color) == 3) list($r, $g, $b) = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
			    else return false;
			
			    $r = hexdec($r); $g = hexdec($g); $b = hexdec($b);
			    return array($r, $g, $b);
			}
			
			function p_message($message) {
				if(!defined('p_error')) define('p_error', $message);
			}
			
			function p_emptyCache($silent = false) {
				global $set;
				
				if(is_dir($set['cache dir'])) {
					if(is_readable($set['cache dir'])) {
						$cache_open = opendir($set['cache dir']);
						
						while($item = readdir($cache_open)) if(is_file($set['cache dir'] . $item)) if(is_writeable($set['cache dir'] . $item))
							unlink($set['cache dir'] . $item);
						elseif($silent == true) p_message('One or more files could not be deleted. It seems that these files are write protected. Please try to change file permissions via FTP.');
					} elseif($silent == true)
						p_message('The cache directory is not readable. Please try to change directory permissions via FTP.');

					if(is_writeable($set['cache dir'])) rmdir($set['cache dir']);
						elseif($silent == true) p_message('The cache directory is write protected. Please try to change directory permissions via FTP.');
				}
			}
			
			function p_getMemoryLimit() {
				$memory_limit = ini_get('memory_limit');

				if(is_numeric($memory_limit)) {
					return $value;
				} else {
			    	$memory_limit_length = strlen($memory_limit);
			        $qty = substr($memory_limit, 0, $memory_limit_length - 1);
					$unit = strtolower(substr($memory_limit, $memory_limit_length - 1));
			        
					switch($unit) {
			            case 'k': $qty *= 1024; break;
			            case 'm': $qty *= 1048576; break;
			            case 'g': $qty *= 1073741824; break;
					}

					return $qty;
				}
			}
			
// DATA CHECK
			
			// PHP
			if(phpversion() < 4) p_message('<strong>System error:</strong>: Pagemap ImageWall needs at least PHP 4.01. Your current installed PHP version is ' . phpversion());
			if(!extension_loaded('gd')) p_message('<strong>System error:</strong> Pagemap ImageWall needs the PHP extension GD-LIB for rendering images. Contact your hosting provider for information how to enable the extension.');
			
			// Images Dir
			$config['Images Dir'] = empty($config['Images Dir']) ? $set['script dir'] : trim($config['Images Dir'], '/') . '/';
			
			if(!is_dir($config['Images Dir'])) p_message('Image directory <b>' . $config['Images Dir'] . '</b> cannot be found. Please check your configuration.');
			
			// Convert Contact
			$config['Contact'] = strpos($config['Contact'], '@') === false
				? p_addHTTP($config['Contact'])
				: p_encodeEmail('mailto:' . $config['Contact']);
			
			// Validate URL's
			$config['Home Page'] = p_addHTTP($config['Home Page']);
			$config['Imprint'] = p_addHTTP($config['Imprint']);
			
			// Exlude Images
			$set['exclude images'] = array(
				$config['Header Image']
			);
			
			$set['exclude images list'] = explode(',', $config['Exclude Images']);
			foreach($set['exclude images list'] as $item) $set['exclude images'][] = trim($item);
			
			// Thumbnail Background Color
			if(isset($set['color names'][strtolower($config['Thumbnail Background'])])) $config['Thumbnail Background'] = $set['color names'][strtolower($config['Thumbnail Background'])];
			$config['Thumbnail Background'] = p_html2rgb($config['Thumbnail Background']) ? p_html2rgb($config['Thumbnail Background']) : array(0, 0, 0);
			
			// Custom HTML
			if(!empty($config['Custom HTML']) && is_file($config['Custom HTML'])) $config['Custom HTML'] = file_get_contents($config['Custom HTML']);
			
// OUTPUT

			// Thumbnail
			if(isset($_GET['thumbnail']) && is_file($_GET['thumbnail'])) {
				$thumbnail = array();

				$thumbnail['image data'] = getimagesize($_GET['thumbnail']);
				$types = array(1 => 'gif', 'jpeg', 'png', 'swf', 'psd', 'wbmp');

				$thumbnail['resized file name'] = substr($_GET['thumbnail'], strrpos($_GET['thumbnail'], '/') + 1);
				$thumbnail['resized file name'] = substr($thumbnail['resized file name'], 0, strrpos($thumbnail['resized file name'], '.')) . '.' . $types[$thumbnail['image data'][2]];

	   			$thumbnail['resized width'] = p_getThumbnailSize($config['Thumbnail Size']);
	   			$thumbnail['resized height'] = p_getThumbnailSize($config['Thumbnail Size']);

				if($config['Thumbnail Cropped'] == 'on') {
					if($thumbnail['image data'][0] > $thumbnail['image data'][1]) $thumbnail['resized width'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][0] / $thumbnail['image data'][1]);
						else $thumbnail['resized height'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][1] / $thumbnail['image data'][0]);
    			} else {
    		    	if($thumbnail['image data'][0] > $thumbnail['image data'][1]) $thumbnail['resized height'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][1] / $thumbnail['image data'][0]);
    		    		else $thumbnail['resized width'] = floor(p_getThumbnailSize($config['Thumbnail Size']) * $thumbnail['image data'][0] / $thumbnail['image data'][1]);
    			}
				
				header('content-type: image/' . $types[$thumbnail['image data'][2]]);
				
				if(!is_file($set['cache dir'] . $thumbnail['resized file name'])) {
					if(filesize($_GET['thumbnail']) > p_getMemoryLimit() && exif_thumbnail($_GET['thumbnail']) == false) {
						$thumbnail['exif image'] = exif_thumbnail($_GET['thumbnail'], $thumbnail['image data'][0], $thumbnail['image data'][1], $thumbnail['image data'][2]);
						$thumbnail['original image'] = imagecreatefromstring($thumbnail['exif image']);
					} else {
						$thumbnail['original image'] = call_user_func('imagecreatefrom' . $types[$thumbnail['image data'][2]], $_GET['thumbnail']);
					}
					
					$thumbnail['resized image'] = imagecreatetruecolor(p_getThumbnailSize($config['Thumbnail Size']), p_getThumbnailSize($config['Thumbnail Size']));
					imagecopyresampled($thumbnail['resized image'], $thumbnail['original image'], 0, 0, 0, 0, $thumbnail['resized width'], $thumbnail['resized height'], $thumbnail['image data'][0], $thumbnail['image data'][1]);
					
					if($config['Thumbnail Cropped'] == 'on') {
						$thumbnail['thumbnail image'] = $thumbnail['resized image'];
					} else {
						$thumbnail['thumbnail image'] = imagecreatetruecolor(p_getThumbnailSize($config['Thumbnail Size']), p_getThumbnailSize($config['Thumbnail Size']));
						
						$background_color = imagecolorallocate($thumbnail['thumbnail image'], $config['Thumbnail Background'][0], $config['Thumbnail Background'][1], $config['Thumbnail Background'][2]);
						imagefill($thumbnail['thumbnail image'], 0, 0, $background_color);
						
						imagecopymerge($thumbnail['thumbnail image'], $thumbnail['resized image'], (p_getThumbnailSize($config['Thumbnail Size']) - $thumbnail['resized width']) / 2, (p_getThumbnailSize($config['Thumbnail Size']) - $thumbnail['resized height']) / 2, 0, 0, $thumbnail['resized width'], $thumbnail['resized height'], 100);
					}
					
					if($types[$thumbnail['image data'][2]] != 'jpeg') $config['Thumbnail Quality'] = '';
					
					if(is_writeable($set['cache dir'])) call_user_func('image' . $types[$thumbnail['image data'][2]], $thumbnail['thumbnail image'], $set['cache dir'] . $thumbnail['resized file name'], $config['Thumbnail Quality']);
					call_user_func('image' . $types[$thumbnail['image data'][2]], $thumbnail['thumbnail image'], false, $config['Thumbnail Quality']);
					
					imagedestroy($thumbnail['original image']);
					imagedestroy($thumbnail['resized image']);
					imagedestroy($thumbnail['thumbnail image']);
				} else
					readfile($set['cache dir'] . $thumbnail['resized file name']);
				
				exit();
			}
			
			// Resized image
			if(isset($_GET['image']) && is_file($_GET['image'])) {
				$image['image data'] = getimagesize($_GET['image']);
				$types = array(1 => 'gif', 'jpeg', 'png', 'swf', 'psd', 'wbmp');
				
				header('content-type: image/' . $types[$image['image data'][2]]);
				
				$image['resized file name'] = substr($_GET['image'], strrpos($_GET['image'], '/') + 1);
				$image['resized file name'] = substr($image['resized file name'], 0, strrpos($image['resized file name'], '.')) . '_resized' . '.' . $types[$image['image data'][2]];
					
				if(empty($config['Image Size'])) $config['Image Size'] = $set['fallback image size'];
				$image['resize'] = ($image['image data'][0] > $config['Image Size'] || $image['image data'][1] > $config['Image Size']) ? 1 : 0;
			
				if($image['resize'] == 1 && !is_file($set['cache dir'] . $image['resized file name'])) {
					$image['resized width'] = $config['Image Size'];
					$image['resized height'] = $config['Image Size'];
					
	   		    	if($image['image data'][0] > $image['image data'][1]) $image['resized height'] = floor($config['Image Size'] * $image['image data'][1] / $image['image data'][0]);
	   		    		else $image['resized width'] = floor($config['Image Size'] * $image['image data'][0] / $image['image data'][1]);
				
					$image['original'] = call_user_func('imagecreatefrom' . $types[$image['image data'][2]], $_GET['image']);

					$image['resized'] = imagecreatetruecolor($image['resized width'], $image['resized height']);
					imagecopyresampled($image['resized'], $image['original'], 0, 0, 0, 0, $image['resized width'], $image['resized height'], $image['image data'][0], $image['image data'][1]);
					
					if(is_writeable($set['cache dir'])) call_user_func('image' . $types[$image['image data'][2]], $image['resized'], $set['cache dir'] . $image['resized file name'], 90);
					call_user_func('image' . $types[$image['image data'][2]], $image['resized'], false, 90);
					
					imagedestroy($image['original']);
					imagedestroy($image['resized']);
				} else
					readfile($image['resize'] == 1 ? $set['cache dir'] . $image['resized file name'] : $_GET['image']);
				
				exit();
			}

			// Layout files
			if(isset($_GET['symbol'])) {
				header('content-type: image/gif');
				
				$set['symbol name'] = 'image ' . $_GET['symbol'];
				if(isset($set[$set['symbol name']])) echo base64_decode($set[$set['symbol name']]);

				exit();
			}

// CACHE
			
			if(is_dir($set['cache dir']) && is_file($set['config file']) && filemtime($set['cache dir']) < filemtime($set['config file'])) p_emptyCache(true);
			if(!is_dir($set['cache dir']) && is_writeable($config['Images Dir'])) mkdir($set['cache dir'], 0777);

// IMAGE LIST
			
			// Get images
			if(empty($config['Images List'])) {
				// From dir
				$set['images dir open'] = opendir($config['Images Dir']);
				$images = array();
				
				while($item = readdir($set['images dir open'])) {
					if(is_file($config['Images Dir'] . $item) && !in_array($item, $set['exclude images'])) {
						$imagedata = getimagesize($config['Images Dir'] . $item);
						if($imagedata[2] == 1 || $imagedata[2] == 2 || $imagedata[2] == 3) $images[] = $item;
					}
				}
				
				closedir($set['images dir open']);
			} else {
				// From list
				if(!stristr($config['Images List'], ',') && !is_file($config['Images List'])) {
					p_message('Your image list respectively a file with name <b>' . $config['Images List'] . '</b> cannot be found.');
					$config['Images List'] = '';
				}
				
				if(stristr($config['Images List'], '.txt'))
					$config['Images List'] = is_file($config['Images List']) ? file_get_contents($config['Images List']) : '';
				
				$images = empty($config['Images List']) ? array() : explode(',', $config['Images List']);
				for($i = 0; $i < count($images); $i++) $images[$i] = trim($images[$i]);
				
				if(count($images) == 0) p_message('<b>No images found.</b> Your file list is empty.');
			}
			
			// Sort images
			switch($config['Sort']) {
    			case 'normal' : sort($images); break;
    			case 'reverse' : rsort($images); break;
    			case 'shuffle' : shuffle($images); break;
    		}
			
			// Get number of existing files
			for($i = 0; $i < count($images); $i++) if(is_file($config['Images Dir'] . $images[$i])) break;
			
			if($i == count($images)) {
				p_message('<b>No images found.</b> The specified file(s) in Images List cannot be found.');
				$images = array();
			}
			
			// Get number of images
			$number_of_images = count($images);
			if($number_of_images == 0) p_message('<b>No images found.</b> Put some images in this folder or use the <b>[Images List: ]</b> tag in <b>' . $set['config file'] . '</b> for a custom list (comma separated).');

// UNINSTALL

			if(basename($_SERVER['PHP_SELF']) == 'uninstall.php') {
				$images = array();
				$number_of_images = 0;
				
				p_emptyCache(false);
				
				if(is_file($set['config file']) && is_writeable($set['config file'])) unlink($set['config file']);
				
				if(!is_dir($set['cache dir']) && !is_file($set['config file'])) p_message('<b>Uninstall report:</b> The cache directory and the config file were deleted successfully. You can now delete this file via FTP.');
				if(!is_dir($set['cache dir']) && is_file($set['config file'])) p_message('<b>Uninstall report:</b> The cache directory was deleted successfully. You can now delete this and all related files via FTP.');
			}

// GALLERY
			
			// Send header
			if($config['Embedded Script'] == 'off' || headers_sent() == false) header('content-type: text/html; charset=utf-8');
?>

<?php if($config['Embedded Script'] == 'off') { ?>
	<!DOCTYPE html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta name="author" content="<?php echo strip_tags($config['Author']); ?>" />
		<meta name="description" content="<?php echo strip_tags($config['Gallery Description']); ?>" />
		<meta name="generator" content="Pagemap ImageWall <?php echo $set['script version']; ?>" />

		<title><?php echo strip_tags($config['Gallery Title']); ?></title>
		
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $set['script name']; ?>?symbol=favicon" />
		<link rel="start" title="Home Page" href="<?php echo $config['Home Page']; ?>" />
		<link rel="help" title="Pagemap Premium Portfolios" href="http://getpagemap.com/pagemap-imagewall/" />
		
		<style type="text/css">
			body { margin: 50px 25px; background: <?php echo $config['Background']; ?>; text-align: center; font: 12px 'Trebuchet MS', Arial, Helvetica, sans-serif; color: <?php echo $config['Footer Color']; ?>; }
		</style>
<?php } ?>
		
		<style type="text/css">
			/* GALLERY */
			
			p.error { width: 550px; margin: 50px auto; font-size: 14px; }
			a img {	border: none; }
			#imagewall { width: auto; margin: 0 auto; text-align: left; line-height: 0; font-size: 0; }
			#imagewall img { margin: 1px; }
			#footer { margin-top: 25px; font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif; font-size: 11px; font-style: italic; }
			#footer, #footer a { text-decoration: none; color: <?php echo $config['Footer Color']; ?>; }

			/* LIGHTBOX */
			
			#lbOverlay { position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; background: #000 url('<?php echo $set['script name']; ?>?symbol=overlay') repeat; }
			#lbCenter, #lbBottomContainer { position: absolute; z-index: 9999; background: #fff; }
			#lbCenter { z-index: 99999; }
			#lbImageContainer img { -moz-box-shadow: 1px 0 5px #000; -webkit-box-shadow: 1px 0 5px #000; box-shadow: 1px 0 5px #000; }
			#lbCenter .lbLoading { background: #fff url('<?php echo $set['script name']; ?>?symbol=loading') no-repeat center; }
			#lbImage { position: absolute; left: 0; top: 0; }
			#lbPrevLink, #lbNextLink { display: block; position: absolute; background: url('<?php echo $set['script name']; ?>?symbol=blank'); z-index: 9999; top: 0; width: 50%; outline: none; }
			#lbPrevLink { left: 0; }
			#lbPrevLink:hover { background: url('<?php echo $set['script name']; ?>?symbol=prev') no-repeat left center; }
			#lbNextLink { right: 0; }
			#lbNextLink:hover { background: url('<?php echo $set['script name']; ?>?symbol=next') right center no-repeat; }
			#lbBottomContainer { -moz-border-radius: 0 0 3px 3px; -webkit-border-radius: 0 0 3px 3px; border-radius: 0 0 3px 3px; }
			#lbBottom { padding: 5px 10px; text-align: left; font: 10px 'Trebuchet MS', Arial, Helvetica, sans-serif; line-height: 10px; color: #000; }
			#lbCloseLink { display: block; float: right; width: 44px; height: 10px; background: url('<?php echo $set['script name']; ?>?symbol=close') no-repeat right top; outline: none; }
			#lbCaption, #lbNumber { display: inline; }
			#lbCaption { padding-right: 0.5em; font-weight: bold; }
			#lbNumber { color: #666; }
			
			/* CUSTOM CSS */
			
			<?php echo $config['Custom CSS']; ?>
		</style>

		<?php if(!empty($config['jQuery Path'])) { ?><script type="text/javascript" src="<?php echo $config['jQuery Path']; ?>"></script><?php } ?>

<?php if($config['Embedded Script'] == 'off') { ?>
	</head>
	<body>
<?php } ?>
		
		<?php if(defined('p_error')) { ?>
			<p class="error"><?php echo constant('p_error'); ?></p>
		<?php } ?>

		<div id="imagewall">
		<?php if(!empty($config['Header Image'])) { ?>
    		<p id="header-image"><?php if(!empty($config['Home Page'])) { ?><a href="<?php echo $config['Home Page']; ?>"><?php } ?><img src="<?php echo $config['Header Image']; ?>" alt="Header Image" /><?php if(!empty($config['Home Page'])) { ?></a><?php } ?></p>
    	<?php } ?>
			
			<span id="imagewall-container">
			<?php for($i = 0; $i < $number_of_images; $i++) { ?>
				<?php $image_title = str_replace('_', ' ', substr($images[$i], 0, strrpos($images[$i], '.'))); ?>
				<a href="<?php echo (empty($config['Image Size']) ? '' : $set['script name'] . '?image=') . $config['Images Dir'] . $images[$i]; ?>" title="<?php echo $image_title; ?>" target="_blank" rel="lightbox[p]"><img onmouseover="$(this).fadeTo('fast', 0.5)" onmouseout="$(this).fadeTo('fast', 1)" onload="$(this).completed = 1; $(this).delay(60 * <?php echo $i + 1; ?>).fadeTo('slow', 1)" src="<?php echo $set['script name']; ?>?thumbnail=<?php echo $config['Images Dir'] . $images[$i]; ?>" alt="<?php echo $image_title; ?>" width="<?php echo p_getThumbnailSize($config['Thumbnail Size']); ?>" height="<?php echo p_getThumbnailSize($config['Thumbnail Size']); ?>" /></a>
			<?php } ?>
			</span>
		</div>
		
		<script type="text/javascript">
			// Add fade effect to thumbnails
			
			$("#imagewall-container img").each(
				function() { $(this).css('opacity', typeof $(this).completed == 'undefined' ? '0' : '1'); }
			);

		<?php if($config['Embedded Script'] == 'off') { ?>
			// Set width of ImageWall to browser width
			
			$('#imagewall').css({width: $('#imagewall-container').width() + 'px'});
		<?php } ?>
		
			// Slimbox v2.04 (c) Christophe Beyls (http://www.digitalia.be)
			
			eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('(3($){p g=$(R),4,k,q=-1,H,A,B,S,T,n,r,13=!R.20,U=[],1p=1q.1p,6={},14=15 V(),16=15 V(),s,7,v,I,21,J,K,C,L,17,18;$(3(){$("22").W($([s=$(\'<o m="23" />\')[0],7=$(\'<o m="24" />\')[0],C=$(\'<o m="25" />\')[0]]).t("X","1r"));v=$(\'<o m="26" />\').1s(7).W(I=$(\'<o z="D: 28;" />\').W([J=$(\'<a m="29" Y="#" />\').M(19)[0],K=$(\'<a m="2a" Y="#" />\').M(1a)[0]])[0])[0];$(I).2b(1t=$(\'<o m="2c" z="D: 1u; 1b: 0;" />\'));L=$(\'<o m="2d" />\').1s(C).W([$(\'<a m="2e" Y="#" />\').1v(s).M(1c)[0],17=$(\'<o m="2f" />\')[0],18=$(\'<o m="2g" />\')[0],$(\'<o z="2h: 2i;" />\')[0]])[0]});$.1d=3(a,b,c){4=$.2j({N:Z,1w:0.8,1e:10,1f:10,1g:"2k",1x:1y,1z:1y,1A:10,1B:10,1C:"V {x} 2l {y}",1D:[27,2m,2n],1E:[2o,2p],1F:[2q,2r]},c);5(2s a=="2t"){a=[[a,b]];b=0}T=g.1G()+(g.9()/2);n=4.1x;r=4.1z;$(7).t({11:O.1H(0,T-(r/2)),h:n,9:r,1h:-n/2}).1i();S=13||(s.1I&&(s.1I.D!="2u"));5(S)s.z.D="1u";$(s).t("1J",4.1w).1K(4.1e);D();1j(1);k=a;4.N=4.N&&(k.u>1);j 12(b)};$.P.1d=3(c,d,e){d=d||3(a){j[a.Y,a.2v]};e=e||3(){j 1L};p f=1M;j f.1N("M").M(3(){p b=1M,1k=0,E,i=0,u;E=$.2w(f,3(a,i){j e.2x(b,a,i)});2y(u=E.u;i<u;++i){5(E[i]==b)1k=i;E[i]=d(E[i],i)}j $.1d(E,1k,c)})};3 D(){p l=g.2z(),w=g.h();$([7,C]).t("1b",l+(w/2));5(S)$(s).t({1b:l,11:g.1G(),h:w,9:g.9()})}3 1j(c){5(c){$("2A").1v(13?"2B":"2C").1O(3(a,b){U[a]=[b,b.z.F];b.z.F="1l"})}2D{$.1O(U,3(a,b){b[0].z.F=b[1]});U=[]}p d=c?"2E":"1N";g[d]("2F 2G",D);$(1q)[d]("2H",1P)}3 1P(a){p b=a.2I,P=$.2J;j(P(b,4.1D)>=0)?1c():(P(b,4.1F)>=0)?1a():(P(b,4.1E)>=0)?19():Z}3 19(){j 12(A)}3 1a(){j 12(B)}3 12(a){5(a>=0){q=a;H=k[q][0];A=(q||(4.N?k.u:0))-1;B=((q+1)%k.u)||(4.N?0:-1);Q();7.1Q="2K";6=15 V();6.1R=1S;6.G=H}j Z}3 1T(a,b,c,d){5(c>a)c=a;5(d>b)d=b;p e=O.2L(c/a,d/b);j[O.1U(e*a),O.1U(e*b)]}3 1S(){7.1Q="";$(v).t({F:"1l",X:""});p a=1T(6.h,6.9,$(R).h()-2M,$(R).9()-2N);6.h=a[0];6.9=a[1];$(1t).1m(\'<2O G="\'+H+\'" h="\'+6.h+\'" 9="\'+6.9+\'" />\');$(I).h(6.h);$([I,J,K]).9(6.9);$(17).1m(k[q][1]||"");$(18).1m((((k.u>1)&&4.1C)||"").1V(/{x}/,q+1).1V(/{y}/,k.u));5(A>=0)14.G=k[A][0];5(B>=0)16.G=k[B][0];n=v.1W;r=v.1n;p b=O.1H(0,T-(r/2));5(7.1n!=r){$(7).1o({9:r,11:b},4.1f,4.1g)}5(7.1W!=n){$(7).1o({h:n,1h:-n/2},4.1f,4.1g)}$(7).2P(3(){$(C).t({h:n,11:b+r,1h:-n/2,F:"1l",X:""});$(v).t({X:"1r",F:"",1J:""}).1K(4.1A,1X)})}3 1X(){5(A>=0)$(J).1i();5(B>=0)$(K).1i();$(L).t("1Y",-L.1n).1o({1Y:0},4.1B);C.z.F=""}3 Q(){6.1R=2Q;6.G=14.G=16.G=H;$([7,v,L]).Q(1L);$([J,K,v,C]).1Z()}3 1c(){5(q>=0){Q();q=A=B=-1;$(7).1Z();$(s).Q().2R(4.1e,1j)}j Z}})(2S);',62,179,'|||function|options|if|preload|center||height||||||||width||return|images||id|centerWidth|div|var|activeImage|centerHeight|overlay|css|length|image||||style|prevImage|nextImage|bottomContainer|position|filteredLinks|visibility|src|activeURL|sizer|prevLink|nextLink|bottom|click|loop|Math|fn|stop|window|compatibleOverlay|middle|hiddenElements|Image|append|display|href|false|400|top|changeImage|ie6|preloadPrev|new|preloadNext|caption|number|previous|next|left|close|slimbox|overlayFadeDuration|resizeDuration|resizeEasing|marginLeft|show|setup|startIndex|hidden|html|offsetHeight|animate|documentElement|document|none|appendTo|imageContainer|absolute|add|overlayOpacity|initialWidth|250|initialHeight|imageFadeDuration|captionAnimationDuration|counterText|closeKeys|previousKeys|nextKeys|scrollTop|max|currentStyle|opacity|fadeIn|true|this|unbind|each|keyDown|className|onload|animateBox|aspectRatio|round|replace|offsetWidth|animateCaption|marginTop|hide|XMLHttpRequest|imageFull|body|lbOverlay|lbCenter|lbBottomContainer|lbImage||relative|lbPrevLink|lbNextLink|prepend|lbImageContainer|lbBottom|lbCloseLink|lbCaption|lbNumber|clear|both|extend|swing|of|88|67|37|80|39|78|typeof|string|fixed|title|grep|call|for|scrollLeft|object|select|embed|else|bind|scroll|resize|keydown|keyCode|inArray|lbLoading|min|75|100|img|queue|null|fadeOut|jQuery'.split('|'),0,{}))
			
			// Init Slimbox
			
			if(!/android|iphone|ipod|series60|symbian|windows ce|blackberry/i.test(navigator.userAgent)) {
				$("#imagewall-container a[rel^='lightbox']").slimbox({
					counterText: "({x} / {y})",
					initialWidth: 200,
					initialHeight: 200,
					overlayOpacity: 0.85,
					resizeDuration: 300,
					captionAnimationDuration: 200
				}, null, function(el) {
					return (this == el) || ((this.rel.length > 8) && (this.rel == el.rel));
				});
			}
		</script>
		
		<p id="footer">
			<?php if(!empty($config['Home Page'])) { ?><a href="<?php echo $config['Home Page']; ?>">Home</a> • <?php } ?>
			<?php if(!empty($config['Contact'])) { ?><a href="<?php echo $config['Contact']; ?>">Contact</a> • <?php } ?>
			<?php if(!empty($config['Imprint'])) { ?><a href="<?php echo $config['Imprint']; ?>">Imprint</a> • <?php } ?>
			<?php if(!empty($config['Author'])) { ?>Photos by <strong><?php echo $config['Author']; ?></strong> • <?php } ?>
			Powered by <a href="http://getpagemap.com/pagemap-imagewall/" title="A free web gallery script for portfolio websites"><strong>Pagemap ImageWall</strong> <sup><?php echo $set['script version']; ?></sup></a>
		</p>
		
		<?php echo $config['Custom HTML']; ?>
		
<?php if($config['Embedded Script'] == 'off') { ?>
	</body>
	</html>
<?php } else $set = null; ?>