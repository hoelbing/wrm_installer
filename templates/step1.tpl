{config_load file=test.conf section="setup"}
{include file="header.tpl" title=foo}
<form method="post" action="{$form_action}">

{$select_lang}: <select name=classlang_type>
{html_options values=$classlang_type_values selected=$classlang_type_selected output=$classlang_type_values}
</select>

 <table align="center" width="600">
  <tr>
   <td><div align="center"><b>{$headtitle}</b></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  {$erromsg}
  <tr>
   <td><table width="70%" align="center">
     <td>{$db_name_text}</td>
     <td><input type="text" name="db_name" class="post" value="{$db_name_value}"></td>
    </tr>
    <tr>
     <td>{$db_server_hostname_text}</td>
     <td><input type="text" name="db_server_hostname" class="post" value="{$db_server_hostname_value}"></td>
    </tr>
    <tr>
     <td>{$db_username_text}</td>
     <td><input type="text" name="db_username" class="post" value="{$db_username_value}"></td>
    </tr>
    <tr>
     <td>{$db_password_text}</td>
     <td><input type="text" name="db_password" class="post" value="{$db_password_value}"></td>
    </tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
    <tr>
     <td>{$db_tableprefix_text}</td>
     <td><input type="text" name="db_tableprefix" class="post" value="{$db_tableprefix_value}"></td>
    </tr>

   </table>
  <tr>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td><div align="center">
		<input type="submit" name="submit" value="{$bd_submit}">
   		<input type="hidden" name="step" value="1">

	  </div></td>
  </tr>
 </table>  

</form>

{include file="footer.tpl"}
