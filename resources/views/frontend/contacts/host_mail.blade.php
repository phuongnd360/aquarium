<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="background: linear-gradient(#FFF, #F7F7F7); padding: 5px;">
<h4> <span style="font-weight:bold">Dear</span> Mr./Mrs. {{$name}} </h4>

<table>
	<tbody>
		<tr>
			<td style="font-weight:bold">Name : </td>
			<td>{{ $name }}</td>
		</tr>
		<tr>
			<td style="font-weight:bold">Email : </td>
			<td>{{ $email }}</td>
		</tr>
		<tr>
			<td style="font-weight:bold">Phone : </td>
			<td>{{ $phone }}</td>
		</tr>
		<tr>
			<td style="font-weight:bold">Message : </td>
			<td>{!! nl2br($content) !!}</td>
		</tr>
	</tbody>
</table>

{!! $signature !!}

	
</body>
</html>