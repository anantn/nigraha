
		<form  method="post" id="profile" action="addcourses.php">
			<div class="formQuestion">
				<span class="noticeMessage">
					Some fields like collegeID and Name cannot be edited for security reasons.
				</span>
				<span class="emphasise">Personal Details</span>
			</div>
			<table class="formAnswer" style="width: 100%;">
				<tr>
					<td class="emphasise" style="width: 25%;">User ID</td>
					<td>
						<input type="text" name="uid" class="medium"
							dojoType="ValidationTextBox"
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
        <tr>
					<td class="emphasise">Name</td>
					<td>
						<input type="text" name="name" class="medium"
							dojoType="ValidationTextBox"
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Recidence type</td>
					<td>
						<input type="radio" name="resident" value="hosteller" checked />
						<label>Hosteller</label>
						<input type="radio" name="resident" value="dayscholar" />
						<label>Day Scholar</label>
					</td>
				</tr>
				<tr>
					<td class="emphasise">Current Address</td>
					<td>
						<input type="text" name="address" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Gender</td>
					<td>
						<input type="radio" name="gender" value="male" checked />
						<label>Male</label>
						<input type="radio" name="gender" value="female" />
						<label>Female</label>
					</td>
				</tr>
				<tr>
					<td class="emphasise">Nationality</td>
					<td>
						<input type="text" name="nationality" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Blood Group</td>
					<td>
						<input type="text" name="bloodgroup" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Department</td>
					<td>
						<input type="text" name="dept" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Semester</td>
					<td>
						<input type="text" name="semester" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Batch</td>
					<td>
						<input type="text" name="batch" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							invalidMessage="Not a number!" />
				
					</td>
				</tr>
				<tr>
					<td class="emphasise">Year of Joining</td>
					<td>
						<input type="text" name="yoj" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							invalidMessage="Not a year!" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Concession</td>
					<td>
						<input type="text" name="concession" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
              ucfirst="true" />
					</td>
				</tr>
			</table>

			<div class="formQuestion">
				<span class="noticeMessage">This account will remain with you for all 
        your time at MNIT</span>
				<span class="emphasise">Account Creation</span>
			</div>
			<table class="formAnswer" style="width: 100%;">
			  <tr>
					<td class="emphasise" style="width: 25%;">Alias (nickname)</td>
					<td>
						<input type="text" name="alias" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Choose password</td>
					<td>
						<input type="text" name="password1" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Choose password</td>
					<td>
						<input type="text" name="password2" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Alternate email</td>
					<td>
						<input type="text" name="email" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
			</table>

			<div class="formQuestion">
				<span class="noticeMessage">Here you enter contact details for cases of 
        emergency</span>
				<span class="emphasise">Parent Details</span>
			</div>
			<table class="formAnswer" style="width: 100%;">
			  <tr>
					<td class="emphasise" style="width: 25%;">Parent's Name</td>
					<td>
						<input type="text" name="fname" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Street Address</td>
					<td>
						<input type="text" name="fstreet" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">City</td>
					<td>
						<input type="text" name="fcity" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">PIN</td>
					<td>
						<input type="text" name="fpin" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">State</td>
					<td>
						<input type="text" name="fstate" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Country</td>
					<td>
						<input type="text" name="fcountry" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Day Phone No</td>
					<td>
						<input type="text" name="fphone" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
			</table>


	  	<table align="center">
	  		<tr>
		  		<td style="width: 7em;">
					</td>
					<td style="width: 7em;">
						<button dojoType="Button">
							<img src="images/ok.gif" height="18" alt="OK" />
							Submit
						</button>
					</td>
				</tr>
			</table>
		</form>

