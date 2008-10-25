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
   <td>&nbsp;<br><i>{$system_requirements}:</i>
   <table width="70%" align="center">
    <tr>
     <td><u>{$property}</u></td>
     <td><u>{$required}</u></td>
     <td><u>{$exist}</u></td>
    </tr>
    <tr>
     <td>{$phpversion_text}</td>
     <td>4.0.1</td>
     <td bgcolor="{$phpversion_bgcolor}">{$phpversion_value}</td>
    </tr>
    <tr>
     <td>{$mysqlversion_text}</td>
     <td>4.1.0</td>
     <td bgcolor="{$mysqlversion_bgcolor}">{$mysqlversion_value}</td>
    </tr>
    <tr>
     <td>upload_max_filesize</td>
     <td>> 0</td>
     <td bgcolor="{$upload_max_filesize_bgcolor}">{$upload_max_filesize_value}</td>
    </tr>
    <tr>
     <td>magic_quotes_sybase</td>
     <td>{$nonactive}</td>
     <td bgcolor="{$magic_quotes_sybase_bgcolor}">{$magic_quotes_sybase_value}</td>
	</tr>
    <tr>
     <td>{$writeable_config_text}</td>
     <td>{$yes}</td>
     <td bgcolor="{$writeable_config_bgcolor}">{$writeable_config_value}</td>
	</tr>
   </table>
  <tr>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td><div align="center">
	  	<select name="mode">
			{html_options values=$mode_option_values selected=$mode_option_selected output=$mode_option_output}
		</select>  
		<input type="submit" name="submit" value="{$bd_submit}">
   		<input type="hidden" name="step" value="1">

	  </div></td>
  </tr>
 </table>  

</form>

{include file="footer.tpl"}
