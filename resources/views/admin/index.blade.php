@extends('layouts.app')

@section('style')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css"/>
@endsection

@section('content')


<!DOCTYPE html >
<html>
<head>
    
<meta charset="UTF-8">
<title>管理者</title>
</head>
<body>

<!-- 이거 일단 유저 데이터로 불러와지는지 확인해봄(성공) => 나중에 주문테이블 데이터로 변경 -->
@foreach($admins as $admin)
  ID : {{ $admin-> id}}

@endforeach
    
<table border="1" bordercolor="skyblue" width ="1000" height="500" align = "center" >

	<caption><h1 class='text-3xl'>受注管理</h1></caption>
   


<thead>
    <tr align = "center" bgcolor="green">
    <td>No.</td>
	<td>氏名</td>
	<td>種類</td>
    <td>個数</td>
    <td>合計金額</td>
	<td>発注日</td>
    <td>入金状況</td>
    <td>発送状況</td>
    <td>詳細/更新</td>
    </tr>
</thead>

<tbody>
    <tr>
	<td></td>
	<td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="#">詳細</a>/<a href="#">更新</a></td>
    </tr>

    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="#">詳細</a>/<a href="#">更新</a></td>
    </tr>

    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="#">詳細</a>/<a href="#">更新</a></td>
    </tr>

    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="#">詳細</a>/<a href="#">更新</a></td>
    </tr>

    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="#">詳細</a>/<a href="#">更新</a></td>
    </tr>
    
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><a href="#">詳細</a>/<a href="#">更新</a></td>
    </tr>

</tbody>

</table>
</body>
</html>

@endsection