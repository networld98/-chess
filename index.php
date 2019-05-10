<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>Chess PHP</title>
</head>
<body>
<?php
$size = 8;
$board = array_fill(0, $size, array_fill(0,$size,0));
$count = 0;
echo "<pre>";
function showBoard()
{
    global $size, $board;
    for($a = 0; $a < $size; ++$a)
    {
        for($b = 0; $b < $size; ++$b)
        {
            echo ($board[$a][$b]) ? "&#9819; " : "&#9633; ";
        }
        echo "\r\n";
    }
}

function tryQueen($a, $b)
{
    global $board, $size;
    for($i = 0; $i < $a; ++$i)
    {
        if($board[$i][$b])
        {
            return false;
        }
    }

    for($i = 1; $i <= $a && $b-$i >= 0; ++$i)
    {
        if($board[$a-$i][$b-$i])
        {
            return false;
        }
    }

    for($i = 1; $i <= $a && $b+$i < $size; $i++)
    {
        if($board[$a-$i][$b+$i])
        {
            return false;
        }
    }

    return true;
}

function setQueen($a)
{
    global $size, $count, $board;
    if($a == $size)
    {
        echo "Результат №".(++$count).":\r\n";
        showBoard();
        echo "\r\n";
        return;
    }
    for($i = 0; $i < $size; ++$i)
    {
        if(tryQueen($a, $i))
        {
            $board[$a][$i] = 1;
            setQueen($a+1);
            $board[$a][$i] = 0;
        }
    }
    return;
}
setQueen(0);
echo "</pre>";
?>
</body>
</html>
