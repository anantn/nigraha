
		<form  method="post" id="profile" action="addcourses.php">
			<div class="formQuestion">
				<span class="noticeMessage">
					As you type in the text below, notice how your input is auto
					corrected and also the auto completion on the state field.
				</span>
				<span class="emphasise">Name And Address</span>
			</div>
			<table class="formAnswer" style="width: 100%;">
				<tr>
					<td class="emphasise">Name*</td>
					<td width="100%">
						<input type="text" name="name" class="medium"
							dojoType="ValidationTextBox"
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Address</td>
					<td>
						<input type="text" name="address" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">City*</td>
					<td>
						<input type="text" name="city" class="medium"
							dojoType="ValidationTextBox"
							trim="true" 
							required="true" 
							ucfirst="true" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">State</td>
					<td>
						<input dojoType="combobox"
							dataUrl="../../tests/widget/comboBoxData.js" style="width: 300px;" name="foo.bar" />
					</td>
				</tr>
				<tr>
					<td class="emphasise">Zip*</td>
					<td>
						<input type="text" name="zip" class="medium"
							dojoType="UsZipTextbox"
							trim="true" 
							required="true" 
							invalidMessage="Invalid US Zip Code." />
					</td>
				</tr>
			</table>

			<div class="formQuestion">
				<span class="noticeMessage">Custom checkboxes have custom images...</span>
				<span class="emphasise">Skills</span>
			</div>
			<div class="formAnswer">
				<input type="checkbox" name="cb1" id="cb1" dojoType="Checkbox" /> <label for="cb1">IT</label><br />
				<input type="checkbox" name="cb2" id="cb2" dojoType="Checkbox" /> <label for="cb2">Marketing</label><br />
				<input type="checkbox" name="cb3" id="cb3" dojoType="Checkbox" /> <label for="cb3">Business</label><br />
			</div>

			<div class="formQuestion">
				<span class="noticeMessage">Rich text editor that expands as you type in text</span>
				<span class="emphasise">Self description</span>
			</div>
			<div class="formAnswer">
				<textarea dojoType="Editor" items="formatblock;|;insertunorderedlist;insertorderedlist;|;bold;italic;underline;strikethrough;|;createLink;" minHeight="5em">
				Write a brief summary of &lt;i&gt;your&lt;/i&gt; job skills... using &lt;b&gt;rich&lt;/b&gt; text.
				</textarea>
			</div>
			
			<div class="formQuestion">
				<span class="emphasise">Desired employment length</span>
			</div>
			<table class="formAnswer"  style="width: 100%;">
				<tr>
					<td>Start date</td>
					<td><div dojoType="datepicker"/></td>
					<td>End date</td>
					<td><div dojoType="datepicker"/></td>
				</tr>
			</table>
			
		  	<table align="center">
		  		<tr>
			  		<td style="width: 7em;">
						<button dojoType="Button">
							<img src="../../demos/widget/Mail/cancel.gif" height="18" alt="Cancel" />
							Cancel
						</button>
					</td>
					<td style="width: 7em;">
						<button dojoType="Button">
							<img src="../../demos/widget/Mail/ok.gif" height="18" alt="OK" />
							OK
						</button>
					</td>
				</tr>
			</table>
		</form>

