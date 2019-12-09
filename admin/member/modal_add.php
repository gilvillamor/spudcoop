<!-- Button to trigger modal -->
<!-- Button to trigger modal -->
<a class="btn btn-primary" href="../home.php" data-toggle="modal">Back to Home</a>
<br>
<br>
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">

<h3 id="myModalLabel">Add</h3>
</div>
<div class="modal-body">

<form method="post" action="add.php"  enctype="multipart/form-data">
<table class="table1">
<tr>
<td><label style="color:#3a87ad; font-size:18px;">Event Title</label></td>
<td width="30"></td>
<td><input type="text" name="event_title" required /></td>
</tr>
<tr>
<td><label style="color:#3a87ad; font-size:18px;">Event Description</label></td>
<td width="30"></td>
<td><textarea rows = "5" cols = "50" name = "event_description"></textarea></td>
</tr>
<tr>
<td><label style="color:#3a87ad; font-size:18px;">Date</label></td>
<td width="30"></td>
<td><input type="date" name="event_date" placeholder="date" required /></td>
</tr>
<tr>
<td><label style="color:#3a87ad; font-size:18px;">Time</label></td>
<td width="30"></td>
<td><input type="time" name="event_time" placeholder="date" required /></td>
</tr>
<tr>
<td><label style="color:#3a87ad; font-size:18px;">Address</label></td>
<td width="30"></td>
<td><textarea rows = "5" cols = "50" name = "event_address"></textarea></td>
</tr>

<tr>
<td><label style="color:#3a87ad; font-size:18px;">Image</label></td>
<td width="30"></td>
<td><input type="file" name="image" required /></td>
</tr>

</table>


</div>
<div class="modal-footer">
<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
<button type="submit" name="Submit" class="btn btn-primary">Add</button>
</div>


</form>
</div>			