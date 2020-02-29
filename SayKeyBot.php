<?php
// Config
$API_KEY = '123456789:MSX15Awesome';
define('API_KEY',$API_KEY);
// Function
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
// Variables
$update = json_decode(file_get_contents('php://input'));
@$data = $update->callback_query->data;
@$from_id2 = $update->callback_query->from->id;
@$chat_id2 = $update->callback_query->chat->id;
@$message_id2 = $update->callback_query->message->message_id;
@$message = $update->message;
@$chat_id = $message->chat->id;
@$from_id = $message->from->id;
@$reply = $update->message->reply_to_message->forward_from->id;
@$message_id = $update->callback_query->message->message_id;
@$text = $message->text;
// Make "type" directory
@mkdir("type/");
// Keyboards
$emojikeys = json_encode([
'inline_keyboard'=>[
[['text'=>"Send",'callback_data'=>"send"]],
[['text'=>"😀",'callback_data'=>"_😀"],['text'=>"😆",'callback_data'=>"_😆"],['text'=>"😅",'callback_data'=>"_😅"],
['text'=>"😂",'callback_data'=>"_😂"],['text'=>"🤣",'callback_data'=>"_🤣"],['text'=>"☺️",'callback_data'=>"_☺️"]],
[['text'=>"😊",'callback_data'=>"_😊"],['text'=>"😇",'callback_data'=>"_😇"],['text'=>"🙂",'callback_data'=>"_🙂"],
['text'=>"🙃",'callback_data'=>"_🙃"],['text'=>"😉",'callback_data'=>"_😉"],['text'=>"😌",'callback_data'=>"_😌"]],
[['text'=>"😍",'callback_data'=>"_😍"],['text'=>"🥰",'callback_data'=>"_🥰"],['text'=>"😘",'callback_data'=>"_😘"],
['text'=>"😘",'callback_data'=>"_😘"],['text'=>"😗",'callback_data'=>"_😗"],['text'=>"😙",'callback_data'=>"_😙"]],
[['text'=>"😚",'callback_data'=>"_😚"],['text'=>"😋",'callback_data'=>"_😋"],['text'=>"😛",'callback_data'=>"_😛"],
['text'=>"😝",'callback_data'=>"_😝"],['text'=>"😜",'callback_data'=>"_😜"],['text'=>"🤪",'callback_data'=>"_🤪"]],
[['text'=>"🤨",'callback_data'=>"_🤨"],['text'=>"🧐",'callback_data'=>"_🧐"],['text'=>"🤓",'callback_data'=>"_🤓"],['text'=>"😎",'callback_data'=>"_😎"],['text'=>"🤩",'callback_data'=>"_🤩"],['text'=>"🥳",'callback_data'=>"_🥳"]],
[['text'=>"😏",'callback_data'=>"_😏"],['text'=>"😒",'callback_data'=>"_😒"],['text'=>"😞",'callback_data'=>"_😞"],
['text'=>"😔",'callback_data'=>"_😔"],['text'=>"😟",'callback_data'=>"_😟"],['text'=>"😕",'callback_data'=>"_😕"]],
[['text'=>"🙁",'callback_data'=>"_🙁"],['text'=>"☹️",'callback_data'=>"_☹️"],['text'=>"😣",'callback_data'=>"_😣"],
['text'=>"😖",'callback_data'=>"_😖"],['text'=>"😫",'callback_data'=>"_😫"],['text'=>"😩",'callback_data'=>"_😟"]],
[['text'=>"🥺",'callback_data'=>"_🥺"],['text'=>"😢",'callback_data'=>"_😢"],['text'=>"😭",'callback_data'=>"_😭"],
['text'=>"😤",'callback_data'=>"_😤"],['text'=>"😠",'callback_data'=>"_😠"],['text'=>"😡",'callback_data'=>"_😡"]],
[['text'=>"🤬",'callback_data'=>"_🤬"],['text'=>"🤯",'callback_data'=>"_🤯"],['text'=>"😳",'callback_data'=>"_😳"],['text'=>"🥵",'callback_data'=>"_🥵"],['text'=>"🥶",'callback_data'=>"_🥶"],['text'=>"😱",'callback_data'=>"_😱"]],
[['text'=>"😨",'callback_data'=>"_😨"],['text'=>"😰",'callback_data'=>"_😰"],['text'=>"😥",'callback_data'=>"_😥"],
['text'=>"😓",'callback_data'=>"_😓"],['text'=>"🤗",'callback_data'=>"_🤗"],['text'=>"🤔",'callback_data'=>"_🤔"]],
[['text'=>".",'callback_data'=>"_."],['text'=>"[ SPACE ]",'callback_data'=>"_space"],['text'=>"↩️",'callback_data'=>"_enter"]],
[['text'=>"🇺🇸",'callback_data'=>"fa"],['text'=>"❌",'callback_data'=>"reset"],['text'=>"⬅️",'callback_data'=>"del"],['text'=>"🔢",'callback_data'=>"numbers"],['text'=>"😁",'callback_data'=>"emoji"]],
]]);
$fakeys = json_encode([
'inline_keyboard'=>[
[['text'=>"Send",'callback_data'=>"send"]],
[['text'=>"ض",'callback_data'=>"_ض"],['text'=>"ص",'callback_data'=>"_ص"],['text'=>"ث",'callback_data'=>"_ث"],
['text'=>"ق",'callback_data'=>"_ق"],['text'=>"ف",'callback_data'=>"_ف"],['text'=>"غ",'callback_data'=>"_غ"],
['text'=>"ع",'callback_data'=>"_ع"]],
[['text'=>"ش",'callback_data'=>"_ش"],['text'=>"س",'callback_data'=>"_س"],['text'=>"ی",'callback_data'=>"_ی"],
['text'=>"ب",'callback_data'=>"_ب"],['text'=>"ل",'callback_data'=>"_ل"],['text'=>"ا",'callback_data'=>"_ا"],
['text'=>"ت",'callback_data'=>"_ت"]],
[['text'=>"ظ",'callback_data'=>"_ظ"],['text'=>"ط",'callback_data'=>"_ط"],['text'=>"ژ",'callback_data'=>"_ژ"],
['text'=>"ز",'callback_data'=>"_ز"],['text'=>"ر",'callback_data'=>"_ر"],['text'=>"ذ",'callback_data'=>"_ذ"],
['text'=>"د",'callback_data'=>"_د"]],
[['text'=>"خ",'callback_data'=>"_خ"],['text'=>"ح",'callback_data'=>"_ح"],['text'=>"ج",'callback_data'=>"_ج"],
['text'=>"چ",'callback_data'=>"_چ"],['text'=>"م",'callback_data'=>"_م"],['text'=>"ک",'callback_data'=>"_ک"],
['text'=>"گ",'callback_data'=>"_گ"]],
[['text'=>"ه",'callback_data'=>"_ه"],['text'=>"ن",'callback_data'=>"_ن"],['text'=>"پ",'callback_data'=>"_پ"],['text'=>"و",'callback_data'=>"_و"]],
[['text'=>".",'callback_data'=>"_."],['text'=>"[ SPACE ]",'callback_data'=>"_space"],['text'=>"↩️",'callback_data'=>"_enter"]],
[['text'=>"🇺🇸",'callback_data'=>"fa"],['text'=>"❌",'callback_data'=>"reset"],['text'=>"⬅️",'callback_data'=>"del"],['text'=>"🔢",'callback_data'=>"numbers"],['text'=>"😁",'callback_data'=>"emoji"]],
]]);
$keys = json_encode([
'inline_keyboard'=>[
[['text'=>"Send",'callback_data'=>"send"]],
[['text'=>"q",'callback_data'=>"_q"],['text'=>"w",'callback_data'=>"_w"],['text'=>"e",'callback_data'=>"_e"],
['text'=>"r",'callback_data'=>"_r"],['text'=>"t",'callback_data'=>"_t"],['text'=>"y",'callback_data'=>"_y"],
['text'=>"u",'callback_data'=>"_u"],['text'=>"i",'callback_data'=>"_i"]],
[['text'=>"a",'callback_data'=>"_a"],['text'=>"s",'callback_data'=>"_s"],['text'=>"d",'callback_data'=>"_d"],
['text'=>"f",'callback_data'=>"_f"],['text'=>"g",'callback_data'=>"_g"],['text'=>"h",'callback_data'=>"_h"],
['text'=>"j",'callback_data'=>"_j"],['text'=>"k",'callback_data'=>"_k"]],
[['text'=>"z",'callback_data'=>"_z"],['text'=>"x",'callback_data'=>"_x"],['text'=>"c",'callback_data'=>"_c"],
['text'=>"v",'callback_data'=>"_v"],['text'=>"b",'callback_data'=>"_b"],['text'=>"n",'callback_data'=>"_n"],
['text'=>"m",'callback_data'=>"_m"]],
[['text'=>"⚪️",'callback_data'=>"shifton10"],['text'=>"o",'callback_data'=>"_o"],['text'=>"p",'callback_data'=>"_p"],['text'=>"l",'callback_data'=>"_l"],['text'=>"⬇️",'callback_data'=>"shifton1"]],
[['text'=>".",'callback_data'=>"_."],['text'=>"[ SPACE ]",'callback_data'=>"_space"],['text'=>"↩️",'callback_data'=>"_enter"]],
[['text'=>"🇮🇷",'callback_data'=>"fa"],['text'=>"❌",'callback_data'=>"reset"],['text'=>"⬅️",'callback_data'=>"del"],['text'=>"🔢",'callback_data'=>"numbers"],['text'=>"😁",'callback_data'=>"emoji"]],
]]);
$shiftedkeys = json_encode([
'inline_keyboard'=>[
[['text'=>"Send",'callback_data'=>"send"]],
[['text'=>"Q",'callback_data'=>"_Q"],['text'=>"W",'callback_data'=>"_W"],['text'=>"E",'callback_data'=>"_E"],
['text'=>"R",'callback_data'=>"_R"],['text'=>"T",'callback_data'=>"_T"],['text'=>"Y",'callback_data'=>"_Y"],
['text'=>"U",'callback_data'=>"_U"],['text'=>"I",'callback_data'=>"_I"]],
[['text'=>"A",'callback_data'=>"_A"],['text'=>"S",'callback_data'=>"_S"],['text'=>"D",'callback_data'=>"_D"],
['text'=>"F",'callback_data'=>"_F"],['text'=>"G",'callback_data'=>"_G"],['text'=>"H",'callback_data'=>"_H"],
['text'=>"J",'callback_data'=>"_J"],['text'=>"K",'callback_data'=>"_K"]],
[['text'=>"Z",'callback_data'=>"_Z"],['text'=>"X",'callback_data'=>"_X"],['text'=>"C",'callback_data'=>"_C"],
['text'=>"V",'callback_data'=>"_V"],['text'=>"B",'callback_data'=>"_B"],['text'=>"N",'callback_data'=>"_N"],
['text'=>"M",'callback_data'=>"_M"]],
[['text'=>"⚪️",'callback_data'=>"shifton10"],['text'=>"O",'callback_data'=>"_O"],['text'=>"P",'callback_data'=>"_P"],['text'=>"L",'callback_data'=>"_L"],['text'=>"⬆️",'callback_data'=>"alpha"]],
[['text'=>".",'callback_data'=>"_."],['text'=>"[ SPACE ]",'callback_data'=>"_space"],['text'=>"↩️",'callback_data'=>"_enter"]],
[['text'=>"🇮🇷",'callback_data'=>"fa"],['text'=>"❌",'callback_data'=>"reset"],['text'=>"⬅️",'callback_data'=>"del"],['text'=>"🔢",'callback_data'=>"numbers"],['text'=>"😁",'callback_data'=>"emoji"]],
]]);
$shiftedkeys2 = json_encode([
'inline_keyboard'=>[
[['text'=>"Send",'callback_data'=>"send"]],
[['text'=>"Q",'callback_data'=>"_Q"],['text'=>"W",'callback_data'=>"_W"],['text'=>"E",'callback_data'=>"_E"],
['text'=>"R",'callback_data'=>"_R"],['text'=>"T",'callback_data'=>"_T"],['text'=>"Y",'callback_data'=>"_Y"],
['text'=>"U",'callback_data'=>"_U"],['text'=>"I",'callback_data'=>"_I"]],
[['text'=>"A",'callback_data'=>"_A"],['text'=>"S",'callback_data'=>"_S"],['text'=>"D",'callback_data'=>"_D"],
['text'=>"F",'callback_data'=>"_F"],['text'=>"G",'callback_data'=>"_G"],['text'=>"H",'callback_data'=>"_H"],
['text'=>"J",'callback_data'=>"_J"],['text'=>"K",'callback_data'=>"_K"]],
[['text'=>"Z",'callback_data'=>"_Z"],['text'=>"X",'callback_data'=>"_X"],['text'=>"C",'callback_data'=>"_C"],
['text'=>"V",'callback_data'=>"_V"],['text'=>"B",'callback_data'=>"_B"],['text'=>"N",'callback_data'=>"_N"],
['text'=>"M",'callback_data'=>"_M"]],
[['text'=>"🔵",'callback_data'=>"alpha"],['text'=>"O",'callback_data'=>"_O"],['text'=>"P",'callback_data'=>"_P"],['text'=>"L",'callback_data'=>"_L"],['text'=>"⬇️",'callback_data'=>"shifton1"]],
[['text'=>".",'callback_data'=>"_."],['text'=>"[ SPACE ]",'callback_data'=>"_space"],['text'=>"↩️",'callback_data'=>"_enter"]],
[['text'=>"🇮🇷",'callback_data'=>"fa"],['text'=>"❌",'callback_data'=>"reset"],['text'=>"⬅️",'callback_data'=>"del"],['text'=>"🔢",'callback_data'=>"numbers"],['text'=>"😁",'callback_data'=>"emoji"]],
]]);
$numkeys = json_encode([
'inline_keyboard'=>[
[['text'=>"Send",'callback_data'=>"send"],['text'=>"0",'callback_data'=>"_0"]],
[['text'=>"1",'callback_data'=>"_1"],['text'=>"2",'callback_data'=>"_2"],['text'=>"3",'callback_data'=>"_3"]],[['text'=>"4",'callback_data'=>"_4"],['text'=>"5",'callback_data'=>"_5"],['text'=>"6",'callback_data'=>"_6"]],[['text'=>"7",'callback_data'=>"_7"],['text'=>"8",'callback_data'=>"_8"],['text'=>"9",'callback_data'=>"_9"]],
[['text'=>"⬅️",'callback_data'=>"del"],['text'=>"[ SPACE ]",'callback_data'=>"_space"],['text'=>"❌",'callback_data'=>"reset"]],
[['text'=>"⚪️",'callback_data'=>"shifton20"],['text'=>"🔠",'callback_data'=>"alpha"],['text'=>"⬇️",'callback_data'=>"shifton2"]],
]]);
$shiftednumkeys = json_encode([
'inline_keyboard'=>[
[['text'=>":",'callback_data'=>"_:"],['text'=>"Send",'callback_data'=>"send"],['text'=>";",'callback_data'=>"_;"]],
[['text'=>"!",'callback_data'=>"_!"],['text'=>"@",'callback_data'=>"_@"],['text'=>"#",'callback_data'=>"_#"],['text'=>"$",'callback_data'=>"_$"],['text'=>"%",'callback_data'=>"_%"]],[['text'=>"^",'callback_data'=>"_^"],['text'=>"&",'callback_data'=>"_&"],['text'=>"*",'callback_data'=>"_*"],['text'=>"'",'callback_data'=>"_'"],['text'=>'"','callback_data'=>'_"']],[['text'=>"<",'callback_data'=>"_<"],['text'=>"/",'callback_data'=>"_/"],['text'=>"?",'callback_data'=>"_?"],['text'=>"\ ",'callback_data'=>"_\ "],['text'=>">",'callback_data'=>"_>"]],[['text'=>"[",'callback_data'=>"_["],['text'=>"(",'callback_data'=>"_("],['text'=>")",'callback_data'=>"_)"],['text'=>"]",'callback_data'=>"_]"]],
[['text'=>"⬅️",'callback_data'=>"del"],['text'=>"[ SPACE ]",'callback_data'=>"_space"],['text'=>"❌",'callback_data'=>"reset"]],
[['text'=>"⚪️",'callback_data'=>"shifton20"],['text'=>"🔠",'callback_data'=>"alpha"],['text'=>"⬆️",'callback_data'=>"numbers"]],
]]);
$shiftednumkeys2 = json_encode([
'inline_keyboard'=>[
[['text'=>":",'callback_data'=>"_:"],['text'=>"Send",'callback_data'=>"send"],['text'=>";",'callback_data'=>"_;"]],
[['text'=>"!",'callback_data'=>"_!"],['text'=>"@",'callback_data'=>"_@"],['text'=>"#",'callback_data'=>"_#"],['text'=>"$",'callback_data'=>"_$"],['text'=>"%",'callback_data'=>"_%"]],[['text'=>"^",'callback_data'=>"_^"],['text'=>"&",'callback_data'=>"_&"],['text'=>"*",'callback_data'=>"_*"],['text'=>"'",'callback_data'=>"_'"],['text'=>'"','callback_data'=>'_"']],[['text'=>"<",'callback_data'=>"_<"],['text'=>"/",'callback_data'=>"_/"],['text'=>"?",'callback_data'=>"_?"],['text'=>"\ ",'callback_data'=>"_\ "],['text'=>">",'callback_data'=>"_>"]],[['text'=>"[",'callback_data'=>"_["],['text'=>"(",'callback_data'=>"_("],['text'=>")",'callback_data'=>"_)"],['text'=>"]",'callback_data'=>"_]"]],[['text'=>"⬅️",'callback_data'=>"del"],['text'=>"[ SPACE ]",'callback_data'=>"_space"],['text'=>"❌",'callback_data'=>"reset"]],[['text'=>"🔵",'callback_data'=>"numbers"],['text'=>"🔠",'callback_data'=>"alpha"],['text'=>"⬇️",'callback_data'=>"shifton2"]],
]]);
// Bot
if($text == '/start'){
$members = explode("\n",file_get_contents("users.txt"));
if(!in_array($chat_id,$members)){
$a = file_get_contents("users.txt");
$a = $a."\n".$chat_id;
$a = str_replace("\n\n","\n",$a);
file_put_contents("users.txt",$a);
file_put_contents("type/$chat_id-lang.txt","en");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"Hi dear friend, Welcome to this bot.
This bot is useful for the people that are reported and can't chat for a few moments.

Get help with buttons:
😁: Emoji Panel, To use emojies.
❌: Ctrl+A -> Delete, Delete all your text.
⬅️: Backspace, To delete the last character.
↩️: Enter, To end the current line and get to a new one.
🔢: NumPad, To use numbers(0-9) and special characters(!,*,...).

What extras do:
⚪️ :‌ CapsLock=>OFF
🔵 : CapsLock=>ON
⬆️ : Shift => Selected
⬇️ : Shift => Not Selected

To make a space, use '[ SPACE ]'.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"فارسی",'callback_data'=>"changelang"]]
]
])
]);
}
if(file_get_contents("type/$from_id-numbers.txt")=="shiftednumkeys"){
$keyboard = $shiftednumkeys;
}
if(file_get_contents("type/$from_id-numbers.txt")=="shiftedkeys"){
$keyboard = $shiftedkeys;
}
if(file_get_contents("type/$from_id-numbers.txt")=="shiftednumkeys2"){
$keyboard = $shiftednumkeys2;
}
if(file_get_contents("type/$from_id-numbers.txt")=="shiftedkeys2"){
$keyboard = $shiftedkeys2;
}
if(file_get_contents("type/$from_id-numbers.txt")=="numkeys"){
$keyboard = $numkeys;
}
if(file_get_contents("type/$from_id-numbers.txt")=="keys"){
$keyboard = $keys;
}
if(file_get_contents("type/$from_id-numbers.txt")=="fakeys"){
$keyboard = $fakeys;
}
if(file_get_contents("type/$from_id-numbers.txt")=="emojikeys"){
$keyboard = $emojikeys;
}
if(file_get_contents("type/$from_id-numbers.txt")!="keys"||file_get_contents("type/$from_id-numbers.txt")!="numkeys"||file_get_contents("type/$from_id-numbers.txt")!="shiftedkeys2"||file_get_contents("type/$from_id-numbers.txt")!="shiftednumkeys2"||file_get_contents("type/$from_id-numbers.txt")!="shiftedkeys"||file_get_contents("type/$from_id-numbers.txt")!="shiftednumkeys"||file_get_contents("type/$from_id-numbers.txt")!="fakeys"||file_get_contents("type/$from_id-numbers.txt")!="emojikeys"){
file_put_contents("type/$from_id-numbers.txt","keys");
$keyboard = $keys;
}
$type = file_get_contents("type/$from_id.txt");
if(!$type){
$type = " ";
}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"[ $type ]",
  'reply_markup'=>$keyboard
 ]);
 }
if($text=="/help"){
$lang = file_get_contents("type/$chat_id-lang.txt");
if($lang == "fa"){
$t = "سلام دوست عزیز، به ربات خوش اومدی.
این ربات برای افرادی که برای چند دقیقه محدودیت چت کردن دارن ساخته شده و با کیبوردی که دردسترس هست میتونین پیام هاتون رو بنویسین و بعد فوروارد کنین.

* برای حروف فارسی کافی است روی '🇮🇷' کلیک کنید.

راهنمای دکمه ها:
⬅️: برای حذف آخرین کارکتر از '⬅️' بهره ببرید.
↩️: برای رفتن به خط بعدی از '↩️' استفاده کنید.
😁: برای باز کردن پنل شکلک ها از '😁' استفاده کنید.
❌: برای حذف کل متن نوشته شده از '❌' استفاده کنید.
🔢: برای استفاده از اعداد و حروف خاص باید روی '🔢' کلیک کنید.

راهنمای وضعیت دکمه ها:
⚪️ :‌ CapsLock=>OFF
🔵 : CapsLock=>ON
⬆️ : Shift => Selected
⬇️ : Shift => Not Selected

برای فاصله دادن از '[ SPACE ]' استفاده کنید.";
$k = json_encode([
'inline_keyboard'=>[
[['text'=>"English",'callback_data'=>"changelang"]]
]]);
}else{
$t = "Hi dear friend, Welcome to this bot.
This bot is useful for the people that are reported and can't chat for a few moments.

Get help with buttons:
😁: Emoji Panel, To use emojies.
❌: Ctrl+A -> Delete, Delete all your text.
⬅️: Backspace, To delete the last character.
↩️: Enter, To end the current line and get to a new one.
🔢: NumPad, To use numbers(0-9) and special characters(!,*,...).

What extras do:
⚪️ :‌ CapsLock=>OFF
🔵 : CapsLock=>ON
⬆️ : Shift => Selected
⬇️ : Shift => Not Selected

To make a space, use '[ SPACE ]'.";
$k = json_encode([
'inline_keyboard'=>[
[['text'=>"فارسی",'callback_data'=>"changelang"]]
]]);
}
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$t,
'reply_markup'=>$k
]);
}
if($data=="changelang"){
if(file_get_contents("type/$from_id2-lang.txt")=="fa"){
file_put_contents("type/$from_id2-lang.txt","en");
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"Hi dear friend, Welcome to this bot.
This bot is useful for the people that are reported and can't chat for a few moments.

Get help with buttons:
😁: Emoji Panel, To use emojies.
❌: Ctrl+A -> Delete, Delete all your text.
⬅️: Backspace, To delete the last character.
↩️: Enter, To end the current line and get to a new one.
🔢: NumPad, To use numbers(0-9) and special characters(!,*,...).

What extras do:
⚪️ :‌ CapsLock=>OFF
🔵 : CapsLock=>ON
⬆️ : Shift => Selected
⬇️ : Shift => Not Selected

To make a space, use '[ SPACE ]'.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"فارسی",'callback_data'=>"changelang"]]
]
])
]);
}else{
file_put_contents("type/$from_id2-lang.txt","fa");
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"سلام دوست عزیز، به ربات خوش اومدی.
این ربات برای افرادی که برای چند دقیقه محدودیت چت کردن دارن ساخته شده و با کیبوردی که دردسترس هست میتونین پیام هاتون رو بنویسین و بعد فوروارد کنین.

* برای حروف فارسی کافی است روی '🇮🇷' کلیک کنید.

راهنمای دکمه ها:
⬅️: برای حذف آخرین کارکتر از '⬅️' بهره ببرید.
↩️: برای رفتن به خط بعدی از '↩️' استفاده کنید.
😁: برای باز کردن پنل شکلک ها از '😁' استفاده کنید.
❌: برای حذف کل متن نوشته شده از '❌' استفاده کنید.
🔢: برای استفاده از اعداد و حروف خاص باید روی '🔢' کلیک کنید.

راهنمای وضعیت دکمه ها:
⚪️ :‌ CapsLock=>OFF
🔵 : CapsLock=>ON
⬆️ : Shift => Selected
⬇️ : Shift => Not Selected

برای فاصله دادن از '[ SPACE ]' استفاده کنید.",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"English",'callback_data'=>"changelang"]]
]
])
]);
}
}

if($data=="changelang2"){
if(file_get_contents("type/$from_id2-lang.txt")=="fa"){
file_put_contents("type/$from_id2-lang.txt","en");
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"👆🏻 Just forward this message and you're done.\nTry again: /start",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"فارسی",'callback_data'=>"changelang2"]]
]
])
]);
}else{
file_put_contents("type/$from_id2-lang.txt","fa");
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"👆🏻 فقط متن بالا رو انتقال بدید به گفتگوی موردنظر و تمام.\nبرای شروع مجدد: /start",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"English",'callback_data'=>"changelang2"]]
]
])
]);
}
}
if($data=="fa"){
if(file_get_contents("type/$from_id2-numbers.txt")=="fakeys"){
file_put_contents("type/$from_id2-numbers.txt","keys");
$keyboard=$keys;
}else{
file_put_contents("type/$from_id2-numbers.txt","fakeys");
$keyboard=$fakeys;
}
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$keyboard
]);
}
if($data=="send"){
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
if(file_get_contents("type/$from_id2-lang.txt")=="fa"){
$text = "👆🏻 فقط متن بالا رو انتقال بدید به گفتگوی موردنظر و تمام.\nبرای شروع مجدد: /start";
$keykey=json_encode([
'inline_keyboard'=>[
[['text'=>"English",'callback_data'=>"changelang2"]]
]]);
}
if(file_get_contents("type/$from_id2-lang.txt")=="en"){
$text = "👆🏻 Just forward this message and you're done.\nTry again: /start";
$keykey=json_encode([
'inline_keyboard'=>[
[['text'=>"فارسی",'callback_data'=>"changelang2"]]
]]);
}
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"$type",
]);
bot('sendMessage',[
'chat_id'=>$from_id2,
'text'=>$text,
'reply_markup'=>$keykey
]);
}
if($data=="shifton10"){
file_put_contents("type/$from_id2-numbers.txt","shiftedkeys2");
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$shiftedkeys2
]);
}
if($data=="shifton20"){
file_put_contents("type/$from_id2-numbers.txt","shiftednumkeys2");
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$shiftednumkeys2
]);
}
if($data=="shifton1"){
file_put_contents("type/$from_id2-numbers.txt","shiftedkeys");
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$shiftedkeys
]);
}
if($data=="shifton2"){
file_put_contents("type/$from_id2-numbers.txt","shiftednumkeys");
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$shiftednumkeys
]);
}
if($data=="del"){
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftednumkeys"){
$keyboard = $shiftednumkeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftedkeys"){
$keyboard = $shiftedkeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftednumkeys2"){
$keyboard = $shiftednumkeys2;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftedkeys2"){
$keyboard = $shiftedkeys2;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="numkeys"){
$keyboard = $numkeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="keys"){
$keyboard = $keys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="fakeys"){
$keyboard = $fakeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="emojikeys"){
$keyboard = $emojikeys;
}
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
$type = substr_replace($type ,"",-1);
file_put_contents("type/$from_id2.txt",$type);
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$keyboard
]);
}
if($data=="reset"){
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftednumkeys"){
$keyboard = $shiftednumkeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftedkeys"){
$keyboard = $shiftedkeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftednumkeys2"){
$keyboard = $shiftednumkeys2;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftedkeys2"){
$keyboard = $shiftedkeys2;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="numkeys"){
$keyboard = $numkeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="keys"){
$keyboard = $keys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="fakeys"){
$keyboard = $fakeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="emojikeys"){
$keyboard = $emojikeys;
}
$type = "";
file_put_contents("type/$from_id2.txt",$type);
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$keyboard
]);
}
if($data=="emoji"){
if(file_get_contents("type/$from_id2-numbers.txt")=="emojikeys"){
$keyboard = $keys;
file_put_contents("type/$from_id2-numbers.txt","keys");
}else{
$keyboard = $emojikeys;
file_put_contents("type/$from_id2-numbers.txt","emojikeys");
}
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$keyboard,
]);
}
if($data=="alpha"){
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
file_put_contents("type/$from_id2-numbers.txt","keys");
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$keys,
]);
}
if($data=="numbers"){
$type = file_get_contents("type/$from_id2.txt");
if(!$type){
$type = " ";
}
file_put_contents("type/$from_id2-numbers.txt","numkeys");
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$numkeys
]);
}
if(strpos($data,"_")!==false){
$data = str_replace("_","",$data);
$data = str_replace("space"," ",$data);
$data = str_replace("enter","\n",$data);
$type = file_get_contents("type/$from_id2.txt");
$type = $type.$data;
file_put_contents("type/$from_id2.txt",$type);
$type = file_get_contents("type/$from_id2.txt");
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftednumkeys"){
file_put_contents("type/$from_id2-numbers.txt","numkeys");
$keyboard = $numkeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftednumkeys2"){
$keyboard = $shiftednumkeys2;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftedkeys"){
file_put_contents("type/$from_id2-numbers.txt","keys");
$keyboard = $keys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="shiftedkeys2"){
$keyboard = $shiftedkeys2;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="numkeys"){
$keyboard = $numkeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="keys"){
$keyboard = $keys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="fakeys"){
$keyboard = $fakeys;
}
if(file_get_contents("type/$from_id2-numbers.txt")=="emojikeys"){
$keyboard = $emojikeys;
}
bot('editmessagetext',[
'chat_id'=>$from_id2,
'message_id'=>$message_id2,
 'text'=>"[ $type ]",
'reply_markup'=>$keyboard
]);
}
?>
