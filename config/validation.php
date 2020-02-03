<?php

return [

	'messagesPost' => [
		"body.required" => "Необходимо ввести сообщение", 
		"body.max" => "Сократите сообщение до 1000 символов", 
		"fileimage.mimes" => "Необходимо выбрать изображение", 
		"fileimage.image" => "Необходимо выбрать изображение", 
		"fileimage.dimensions" => "ВЫберите изображение не более 500 х 500 и не менее 100 х 100 пикселей", 
		"fileimage.max" => "Слишком большой файл",],

	'rulesPost' => [
		'body' => 'required|max:1000', 
		'fileimage' => 'image|mimes:gif,ig4,jpg,jpeg,pct,pict,png,rlc,tif,tiff,tga,bmp,dib,rle,pcx|max:100|
		dimensions:min_width=100,min_height=100,max_width=500,max_height=500'
		,]

];
