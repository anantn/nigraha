    	<form  method="post" id="form1" action="addprofile.php">
  			<div class="formQuestion">
  			</div>
  			<table class="formAnswer" width=100%>
  				<tr>
  					<td class="emphasise" align="right">Username : </td>
  					<td>
  						<input type="text" name="uid" class="medium"
  							dojoType="ValidationTextBox"
  							required="true" 
  							ucfirst="true" />
  					</td>
  				</tr>
  				<tr>
  					<td class="emphasise" align="right">Temp Password : </td>
  					<td>
  						<input type="password" name="passwd" class="medium"
  							dojoType="ValidationTextBox"
  							trim="true" 
  							ucfirst="true" />
  					</td>
  				</tr>
  				<tr>
			  		<td style="width: 7em;">
						
					</td>
					<td style="width: 7em;">
						<button dojoType="Button" name="button" onclick="displayData(); return false;">
							<img src="images/ok.gif" height="18" alt="OK" />
							Validate!
						</button>
					</td>
				</tr>
  			</table>
  		</form>
    
