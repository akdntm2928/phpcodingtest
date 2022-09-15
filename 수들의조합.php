<?php

// 수들의 조합
// N개의 정수가 주어지면 그 숫자들 중 K개를 뽑는 조합의 합이 임의의 정수 M의 배수인 개수
// 는 몇 개가 있는지 출력하는 프로그램을 작성하세요.
// 예를 들면 5개의 숫자 2 4 5 8 12가 주어지고, 3개를 뽑은 조합의 합이 6의 배수인 조합을 
// 찾으면 4+8+12 2+4+12로 2가지가 있습니다.
// ▣ 입력설명
// 첫줄에 정수의 개수 N(3<=N<=20)과 임의의 정수 K(2<=K<=N)가 주어지고, 
// 두 번째 줄에는 N개의 정수가 주어진다.
// 세 번째 줄에 M이 주어집니다.
// ▣ 출력설명
// 총 가지수를 출력합니다.
// ▣ 입력예제 1 
// 5 3
// 2 4 5 8 12
// 6
// ▣ 출력예제 1
// 2

$arr = [2, 4, 5, 8, 12];
$limit = 3;
$mul = 6;
$answer =  0;
$tmp = [];

function solution()
{
    function DFS($v, $s)
    {
        global $mul;
        global $limit;
        global $arr;
        global $tmp;
        global $answer;


        if ($v == $limit) {
            $sum  = array_reduce($tmp, function ($acc, $cur) {
                return $acc + $cur;
            });
            if($sum%$mul ==0) $answer++;
        } else {
            for ($i = $s; $i < count($arr); $i++) {
                $tmp[$v] = $arr[$i];
                DFS($v + 1, $i + 1);
            }
        }
    }
    DFS(0, 0);
    global $answer;
    return $answer;
}

echo solution();
