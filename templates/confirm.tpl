<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="./css/base.css" media="all" />
<title>アンケートフォーム確認</title>
</head>
<body>
<table class="editform">
<tr>
<th>名前</th>
<td>{{$smarty.session.name}}</td>
</tr>
<tr>
<th>性別</th>
<td>{{$sex_value[$smarty.session.sex]}}</td>
</tr>
<tr>
<th>年代</th>
<td>{{$age_value[$smarty.session.age]}}</td>
</tr>
<tr>
<th>好きな動物</th>
<td>
{{foreach from=$smarty.session.animal item=animal name=animal}}
	{{if $smarty.foreach.animal.first}}
		{{$animal_value[$animal]}}
	{{else}}
		,{{$animal_value[$animal]}}
	{{/if}}
{{/foreach}}
</td>
</tr>
<tr>
<th>コメント</th>
<td>{{$smarty.session.comment|nl2br}}</td>
</tr>
<tr>
<td colspan="2">
<form action="confirm.php" method="post">
<input type="submit" name="register" value="登録" />
<input type="submit" name="modify" value="修正" />
</form>
</td>
</tr>
</table>
</body>
</html>
