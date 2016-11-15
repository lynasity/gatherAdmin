<table border="1">
  <tr>
  	<th>username</th>
  	<th>feedback</th>
  </tr>
  @foreach($feedbacks as $feedback)
    <tr>
     <td>{{$feedback->username}}</td>
     <td>{{$feedback->feedback}}</td>
    </tr>
  @endforeach
 </table>
