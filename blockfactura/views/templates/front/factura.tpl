{*
* 2016 FACTURA PUNTO COM SAPI de CV
*
* NOTICE OF LICENSE
*
* This source file is subject to License
* It is also available through the world-wide-web at this URL:
* http://factura.com
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to apps@factura.com so we can send you a copy immediately.
*
*  @author factura.com <apps@factura.com>
*  @copyright  2016 Factura Punto Com
*  International Registered Trademark & Property of factura.com
*}

{capture name=path}{l s='Invoice' mod='blockfactura'}{/capture}
{extends file='page.tpl'}
{block name='page_content'}
<input type="text" name="" value="{$base_dir}" class="form-control" hidden="hidden" id="base_uri_ps">
<input type="text" name="" value="{$ps_version}" class="form-control" hidden="hidden" id="ps_version">
<input type="text" name="" value="{$base_dir_ssl}" class="form-control" hidden="hidden" id="base_uri_ssl">
<input type="text" name="" value="{$ssl_active}" class="form-control" hidden="hidden" id="ssl_enabled">
<div class="alert alert-danger" id="alerts" hidden="true" role="alert">
	<p id="error"></p>
</div>
<!-- cambio para la demo -->
<div class="alert alert-success" id="activar" hidden="true">
	<a id="link-activar" style="color: white;">Libera el pedido dando click en la <strong>✓</strong> del mensaje (Opción sólo para Tienda Demo)</a>
</div>
<div class="container" id="block-one">
	<div class="bloque-login">
		<form id="form-one" method="post">
			<legend id="legend">{l s='Billing' mod='blockfactura'}
			<h5>{l s='Enter your RFC, order number and email' mod='blockfactura'}</h5>
			{if isset($encabezado)}
			<hr style="height: 2px; width:30%; background-color: {$colors|escape:'htmlall':'UTF-8'};">
			<h5>{$encabezado|escape:'htmlall':'UTF-8'}</h5>
			{else}
			<hr style="height: 2px; width:30%; background-color: {$colors|escape:'htmlall':'UTF-8'};">
			<h5>Aquí puedes generar las facturas de tus compras realizadas en la tienda.
			Antes de generar la factura, por favor confirme que los datos estén correctamente.
			Ya que una vez emitida o generada la factura no podrá realizar cambios a la misma. Agradecemos su preferencia.
			</h5>
			{/if}
			</legend>
			<fieldset>
				<br>
				<input id="rfc-form-one" type="text" class="login-input animacion-input" placeholder="{l s='RFC' mod='blockfactura'}" name="rfc" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
				<input id="order-form-one" type="text" class="login-input animacion-input" placeholder="{l s='Order number' mod='blockfactura'}" name="order" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
				<input type="email" class="login-input animacion-input" name="email" id="email" placeholder="{l s='Email' mod='blockfactura'}" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">

				<button type="submit" class="boton-login animation-boton" id="btn-one" style="background-color: {$colors|escape:'htmlall':'UTF-8'}">{l s='Send' mod='blockfactura'}</button>
			</fieldset>
		</form>
	</div>
</div>

<div class="container" id="block-two"  hidden="true">
	<div class="bloque-cliente">
		<form id="form-two" method="post">
			<legend id="legend-two">{l s='Check customer data' mod='blockfactura'}
			<h6 id="existente"><br>{l s='The customer exist' mod='blockfactura'}</h6></legend>
			<fieldset>
				<br>

				<input type="hidden" id="action-api" name="action-api">
				<input type="hidden" id="UID" name="UID">

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<select id="data-regimen" name="data-regimen" class="client-input animacion-input">
								<option value="">{l s='Select an option' mod='blockfactura'}</option>
								<option value="601">{l s='General de Ley Personas Morales' mod='blockfactura'}</option>
								<option value="603">{l s='Personas Morales con Fines no Lucrativos' mod='blockfactura'}</option>
								<option value="605">{l s='Sueldos y Salarios e Ingresos Asimilados a Salarios' mod='blockfactura'}</option>
								<option value="606">{l s='Arrendamiento' mod='blockfactura'}</option>
								<option value="607">{l s='Régimen de Enajenación o Adquisición de Bienes' mod='blockfactura'}</option>
								<option value="608">{l s='Demás ingresos' mod='blockfactura'}</option>
								<option value="610">{l s='Residentes en el Extranjero sin Establecimiento Permanente en México' mod='blockfactura'}</option>
								<option value="611">{l s='Ingresos por Dividendos (socios y accionistas)' mod='blockfactura'}</option>
								<option value="612">{l s='Personas Físicas con Actividades Empresariales y Profesionales' mod='blockfactura'}</option>
								<option value="614">{l s='Ingresos por intereses' mod='blockfactura'}</option>
								<option value="615">{l s='Régimen de los ingresos por obtención de premios' mod='blockfactura'}</option>
								<option value="616">{l s='Sin obligaciones fiscales' mod='blockfactura'}</option>
								<option value="620">{l s='Sociedades Cooperativas de Producción que optan por diferir sus ingresos' mod='blockfactura'}</option>
								<option value="621">{l s='Incorporación Fiscal' mod='blockfactura'}</option>
								<option value="622">{l s='Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras' mod='blockfactura'}</option>
								<option value="623">{l s='Opcional para Grupos de Sociedades' mod='blockfactura'}</option>
								<option value="624">{l s='Coordinados' mod='blockfactura'}</option>
								<option value="625">{l s='Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas' mod='blockfactura'}</option>
								<option value="626">{l s='Régimen Simplificado de Confianza' mod='blockfactura'}</option>
							</select>							
							<label for="data-regimen">{l s='Regimen' mod='blockfactura'}</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="contact-email" type="text" class="client-input animacion-input" name="contact-email" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='Email' mod='blockfactura'}</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="contact-telefono" type="text" class="client-input animacion-input" name="contact-telefono" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='Phone' mod='blockfactura'}</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-razonsocial" type="text" class="client-input animacion-input" name="data-razonsocial" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="data-razonsocial">{l s='Business name' mod='blockfactura'}</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-rfc" type="text" class="client-input animacion-input" name="data-rfc" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='RFC' mod='blockfactura'}</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input id="data-calle" type="text" class="client-input animacion-input" name="data-calle" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='Street' mod='blockfactura'}</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-exterior" type="text" class="client-input animacion-input" name="data-exterior" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='Outside number' mod='blockfactura'}</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-interior" type="text" class="client-input animacion-input" name="data-interior" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='Inside number' mod='blockfactura'}</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-colonia" type="text" class="client-input animacion-input" name="data-colonia" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='Colony' mod='blockfactura'}</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-cp" type="text" class="client-input animacion-input" name="data-cp" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};" value="00000">
							<label for="data-cp">{l s='Postal Code' mod='blockfactura'}</label>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-ciudad" type="text" class="client-input animacion-input" name="data-ciudad" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='City' mod='blockfactura'}</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input id="data-delegacion" type="text" class="client-input animacion-input" name="data-delegacion" disabled="true" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
							<label for="rfc">{l s='State' mod='blockfactura'}</label>
						</div>
					</div>
				</div>

				<button type="submit" class="boton-login animation-boton" id="btn-two" style="background-color: {$colors|escape:'htmlall':'UTF-8'}">{l s='Send' mod='blockfactura'}</button>
				<br>
			</fieldset>
		</form>
	</div>

</div>

<!--Form tree data preview-->
<div class="container" id="block-tree" hidden="true">
	<br>
	<div class="bloque-preview">
		<legend id="legend-tree">
			{l s='Verify data' mod='blockfactura'}
			<hr style="height: 2px; width:100%; background-color: {$colors|escape:'htmlall':'UTF-8'}; opacity: 0.6;">
		</legend>

		<div class="row">
			<div class="col-md-6 col-lg-6 col-xs-12">
				<legend id="legend-tree" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
					{l s='Emisor' mod='blockfactura'}
					<hr style="height: 2px; width:100%; background-color: {$colors|escape:'htmlall':'UTF-8'}; opacity: 0.6;">
				</legend>
				<h5 id="receptor-nombre"></h5>
				<h5 id="receptor-rfc"></h5>
				<h5 id="receptor-calle"></h5>
				<h5 id="receptor-colonia"></h5>
				<h5 id="receptor-ciudad"></h5>
				<h5 id="receptor-email"></h5>
			</div>
			<div class="col-md-6 col-lg-6 col-xs-12">
				<legend id="legend-tree" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
					{l s='Receptor' mod='blockfactura'}
					<hr style="height: 2px; width:100%; background-color: {$colors|escape:'htmlall':'UTF-8'}; opacity: 0.6;">
				</legend>
				<h5 id="emisor-nombre"></h5>
				<h5 id="emisor-rfc"></h5>
				<h5 id="emisor-calle"></h5>
				<h5 id="emisor-colonia"></h5>
				<h5 id="emisor-ciudad"></h5>
				<h5 id="emisor-email"></h5>
				<h5 id="emisor-telefono"></h5>
			</div>
		</div>
		<div class="row">
			<br>
			<br>
			<div class="col-md-12 col-lg-12 col-xs-12">
				<legend id="legend-tree" style="border-color: {$colors|escape:'htmlall':'UTF-8'}; ">
					{l s='Order' mod='blockfactura'}
					<hr style="height: 2px; width:100%; background-color: {$colors|escape:'htmlall':'UTF-8'}; opacity: 0.6;">
				</legend>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr class="active">
								<th>{l s='Name' mod='blockfactura'}</th>
								<th>{l s='Quantity' mod='blockfactura'}</th>
									<th>{l s='Unitary Price' mod='blockfactura'}</th>
								<th>{l s='Total' mod='blockfactura'}</th>
							</tr>
						</thead>
						<tbody id="datails-body">

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<legend id="legend-tree" style="border-color: {$colors|escape:'htmlall':'UTF-8'};">
				{l s='Details' mod='blockfactura'}
				<hr style="height: 2px; width:100%; background-color: {$colors|escape:'htmlall':'UTF-8'}; opacity: 0.6;">
			</legend>
			<div class="col-md-4 col-lg-4 col-xs-12">
				<div class="input-group">
					<label for="select-usocfdi"  style="font-size: 18px;">* {l s='Uso Cfdi' mod='blockfactura'}  &nbsp;</label>
						<select id="select-usocfdi" class="input-cap f-input f-select">
							<option value="0">{l s='Select an option' mod='blockfactura'}</option>
							<option value="G01">{l s='Adquisición de mercancias' mod='blockfactura'}</option>
							<option value="G02">{l s='Devoluciones, descuentos o bonificaciones' mod='blockfactura'}</option>
							<option value="G03">{l s='Gastos en general' mod='blockfactura'}</option>
							<option value="I01">{l s='Construcciones' mod='blockfactura'}</option>
							<option value="I02">{l s='Mobilario y equipo de oficina por inversiones' mod='blockfactura'}</option>
							<option value="I03">{l s='Equipo de transporte' mod='blockfactura'}</option>
							<option value="I04">{l s='Equipo de computo y accesorios' mod='blockfactura'}</option>
							<option value="I05">{l s='Dados, troqueles, moldes, matrices y herramental' mod='blockfactura'}</option>
							<option value="I06">{l s='Comunicaciones telefónicas' mod='blockfactura'}</option>
							<option value="I07">{l s='Comunicaciones satelitales' mod='blockfactura'}</option>
							<option value="I08">{l s='Otra maquinaria y equipo' mod='blockfactura'}</option>
							<option value="D01">{l s='Honorarios médicos, dentales y gastos hospitalarios' mod='blockfactura'}</option>
							<option value="D02">{l s='Gastos médicos por incapacidad o discapacidad' mod='blockfactura'}</option>
							<option value="D03">{l s='Gastos funerales' mod='blockfactura'}</option>
							<option value="D04">{l s='Donativos' mod='blockfactura'}</option>
							<option value="D05">{l s='Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)' mod='blockfactura'}</option>
							<option value="D06">{l s='Aportaciones voluntarias al SAR' mod='blockfactura'}</option>
							<option value="D07">{l s='Primas por seguros de gastos médicos' mod='blockfactura'}</option>
							<option value="D08">{l s='Gastos de transportación escolar obligatoria' mod='blockfactura'}</option>
							<option value="D09">{l s='Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones' mod='blockfactura'}</option>
							<option value="D10">{l s='Pagos por servicios educativos (colegiaturas)' mod='blockfactura'}</option>
							<option value="S01">{l s='Sin efectos fiscales' mod='blockfactura'}</option>
						</select>
				</div>
			</div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				
				<div class="col-md-6 col-lg-6 col-xs-12">
					<div class="input-group">
							<label for="select-payment"  style="font-size: 18px;">* {l s='Payment method' mod='blockfactura'}  &nbsp;</label>
							<select id="select-payment" class="input-cap f-input f-select">
										<option value="0">{l s='Select an option' mod='blockfactura'}</option>
										<option value="01">{l s='Cash' mod='blockfactura'}</option>
										<option value="02">{l s='Paycheck' mod='blockfactura'}</option>
										<option value="03">{l s='Electronic funds transfer' mod='blockfactura'}</option>
										<option value="04">{l s='Credit card' mod='blockfactura'}</option>
										<option value="05">{l s='Electronic wallet' mod='blockfactura'}</option>
										<option value="06">{l s='Electronic cash' mod='blockfactura'}</option>
										<option value="08">{l s='Food stamps' mod='blockfactura'}</option>
										<option value="12">{l s='Payment in' mod='blockfactura'}</option>
										<option value="13">{l s='Payment by subrogation' mod='blockfactura'}</option>
										<option value="14">{l s='Payment by consignment' mod='blockfactura'}</option>
										<option value="15">{l s='Condonation' mod='blockfactura'}</option>
										<option value="17">{l s='Compensation' mod='blockfactura'}</option>
										<option value="23">{l s='Novation' mod='blockfactura'}</option>
										<option value="24">{l s='Confution' mod='blockfactura'}</option>
										<option value="25">{l s='Debt remittances' mod='blockfactura'}</option>
										<option value="26">{l s='Prescription or expiration' mod='blockfactura'}</option>
										<option value="27">{l s='To the satisfaction of the creditor' mod='blockfactura'}</option>
										<option value="28">{l s='Debit card' mod='blockfactura'}</option>
										<option value="29">{l s='Service card' mod='blockfactura'}</option>
										<option value="30">{l s='Application of advances' mod='blockfactura'}</option>
										<option value="31">{l s='Payment intermediary' mod='blockfactura'}</option>
										<option value="99">{l s='to define' mod='blockfactura'}</option>
							</select>
					</div>
					<br>
					<br>
						<div id="num-cta-box" hidden="true">
							<label for="f-num-cta" style="width: 285px; font-size: 14px">{l s='Last 4 digits of your account or card' mod='blockfactura'}</label>
							<input type="text"  id="f-num-cta" class="form-control" name="f-num-cta" placeholder="####" size="5" maxlength="4" />
					</div>
				</div>
				
				<div class="col-md-6 col-lg-6 col-xs-12">
					<table style="float: right; margin-right: 5em;">
							<tr>
								<td>{l s='Subtotal:' mod='blockfactura'}</td>
								<td><span id="invoice-subtotal"></span></td>
							</tr>
							<tr>
								<td>{l s='VAT:' mod='blockfactura'}</td>
								<td><span id="invoice-iva"></span></td>
							</tr>
							<tr id="td-discount" hidden="true">
								<td>Descuento:</td>
								<td><span id="invoice-discount"></span></td>
							</tr>
							<tr>
								<td>{l s='Total:' mod='blockfactura'}</td>
								<td><span id="invoice-total"></span></td>
							</tr>
					</table>
				</div>
			</div>
		</div>
		
		<br>
		<br>
		<div class="row">
			<div class="col-md-12 col-lg-12 col-xs-12">
				 	<button style="float: right; margin-left: 20px; background-color: {$colors|escape:'htmlall':'UTF-8'};" id="btn-invoice" type="button" name="button" class="btn btn-info">{l s='CREATE INVOICE' mod='blockfactura'}</button>
					<button style="max-width: 200px; float: right; width: 158px;" id="btn-back" type="button" name="button" class="btn btn-default">{l s='Back' mod='blockfactura'}</button>
			</div>
		</div>
	</div>
</div>

<div class="container" id="block-four" hidden="true">
			<div class="bloque-downloads">
				<div class="row">
					<div class="col-md-12 col-lg-12 col-xs-12">
					<legend id="legend">{l s='Download invoice' mod='blockfactura'}
					<h6 id="aviso-factura">{l s='The invoice was successful' mod='blockfactura'}</h6>
					</legend>
						<br>
						<button class="boton-login animation-boton" id="btn-pdf" style="background-color: {$colors|escape:'htmlall':'UTF-8'};">{l s='PDF' mod='blockfactura'}</button>
						<button class="boton-login animation-boton" id="btn-xml" style="background-color: {$colors|escape:'htmlall':'UTF-8'};">{l s='XML' mod='blockfactura'}</button>
						<hr style="height: 2px; width:60%; background-color: #999; margin-top: 2em;">
						<a  href="{$link->getModuleLink('blockfactura', 'factura', [], true)|escape:'htmlall':'UTF-8'}" class="boton-login animation-boton" style="margin-top: 1em; background-color: {$colors|escape:'htmlall':'UTF-8'};">{l s='Exit' mod='blockfactura'}</a>
				</div>
			</div>
			</div>
</div>

<div id="bar-progress" class="container" hidden="true">
	<div class="bloque-progress">
		<label for="">{l s='Load...' mod='blockfactura'}</label>
		    <div id="progressBar"><div style="background-color: {$colors|escape:'htmlall':'UTF-8'};"></div></div>
	</div>
</div>
{/block}
<style>
.boton-login:hover{
		box-shadow: 10px 10px 25px #999;
		color: white;
		opacity: 1;
}
.btn-info{
  background-color: {$colors|escape:'htmlall':'UTF-8'};
  opacity: 0.8;
  color: white;
}

.btn-info:hover{
	background-color: {$colors|escape:'htmlall':'UTF-8'};
  color: white;
  opacity: inherit;
}

.btn-info:focus{
	background-color: {};
	opacity: 0.8;
  color: white;
}
</style>
