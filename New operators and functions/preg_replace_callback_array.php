<?php
$list = <<< END
<p class=ListParaFirst><span
style='font-family:Symbol;'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>APPLES</p>
  <p class=ListParaMiddle><span
style='font-family:Symbol;'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>BANANAS</p>
  <p class=ListParaMiddle><span
style='font-family:Symbol;'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>ORANGES</p>
  <p class=ListParaLast><span
style='font-family:Symbol;'>·<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span>PEARS</p>
END;

$list_start = '<ul>';
$list_end = '</ul>';
$item_start = '<li>';
$item_end = '</li>';

// Match the last bullet point, and wrap the text
// in a pair of <li> tags followed by closing </ul>
function lastBullet($m) {
    return "<li>$m[1]</li>" . PHP_EOL . '</ul>';
}

$list = preg_replace_callback_array(
    array(
        // Match the bullet text, change case, and
        // replace closing </p> tag with </li>
        '{</span>(\w+)</p>}m' => function($m) use ($item_end) {
            return ucfirst(strtolower($m[1])) . $item_end;
        },
        // Match first bullet point, and add opening <ul> and <li> tags
        '{<p class=ListParaFirst[\s\S]*?</span>}m' => function($m) use ($list_start, $item_start) {
            return $list_start . PHP_EOL . $item_start;
        },
        // Match middle bullets, and add opening <li> tags
        '{<p class=ListParaMiddle[\s\S]*?</span>}m' => function($m) use ($item_start) {
            return $item_start;
        },
        '{<p class=ListParaLast[\s\S]*?</span>(\w+)</li>}m' => 'lastBullet'
    ), $list
);
echo $list;