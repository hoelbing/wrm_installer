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
    <td></td>
  </tr>
  <tr>
    <td>
    <tr>
      <td></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="28%"><div align="center">Bridge installation Mode </div></td>
          <td width="72%">&nbsp;</td>
        </tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
<!-- 
        <tr>
          <td><div align="center">easy</div></td>
          <td>scan all dir </td>
        </tr>
!-->
        <tr>
          <td><div align="center">normal</div></td>
          <td> insert cms/bb dir </td>
        </tr>
        <tr>
          <td><div align="center">expert</div></td>
          <td>insert all value</td>
        </tr>
      </table></td>
    </tr>
    <tr>
	<td>&nbsp;</td>
  </tr>
  <tr>
	<td><div align="center">
	  	<select name="bridge_install_mode">
			{html_options values=$bridge_install_mode_option_values selected=$bridge_install_mode_selected output=$bridge_install_mode_option_output}
		</select>  
		<input type="submit" name="submit" value="{$bd_submit}">
   		<input type="hidden" name="step" value="1">

	  </div></td>
  </tr>
 </table>  

</form>

{include file="footer.tpl"}