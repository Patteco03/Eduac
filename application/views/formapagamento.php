<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
<script>Mercadopago.setPublishableKey("TEST-e61dc9ac-0d97-49ac-9708-e7c427f05dbe");</script>

{BLC_PRODUTOS}
<div class="container-fluid " id="pagamento">

    <div class="row-fluid">

        <div class="col-lg-12">

            <h3 class="title-carrinho">{ACAO}</h3>

        </div>

        <div class="col-lg-12">

            <div class="col-md-3  bhoechie-tab-container">
                <img class="img-responsive" src="<?php echo base_url('assets/img/meu-carrinho.png') ?>">
                <br>
                {BLC_RESUMO}
                <div class="resumoprodutos" style="padding: 10px;">
                    <h5>{descricao}
                        <div class="pull-right">R$ {valorUni}</div>
                    </h5>

                </div>
                {/BLC_RESUMO}
                <span style="padding: 10px;color: #000;">Total:
                <div class="pull-right" style="padding: 10px;color: red">R$ {valor}</div>
                </span>

            </div>

            <div class="col-md-9">

                <div class="col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 bhoechie-tab-menu">
                        <div class="list-group" id="bro-menu">
                            <a href="#" id="m-sadad_olp" class="list-group-item text-center">
                                <img class="img-responsive"
                                     src="<?php echo base_url('assets/img/boleto-icon.png') ?>">
                                <br/>Boleto Bancário
                            </a>
                            <a href="#" id="m-credit_card" class="list-group-item text-center">
                                <img class="img-responsive"
                                     src="<?php echo base_url('assets/img/logo-mercadopago.png') ?>">
                                <br/>Cartão de Crédito
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 bhoechie-tab" id="bro-content">

                        <!-- BOLETO -->
                        <div class="bhoechie-tab-content" id="c-sadad_olp">
                            <h1>Boleto Bancário</h1>
                            <hr/>
                            <div class="row">

                                <h5>Gere seu boleto e pague-o a onde quiser.</h5>
                                <div class="form-group">
                                    <a href="{GERABOLETO}" target="_blank">
                                        <button type="button" class="btn btn-success btn-sm">Gerar Boelto!</button>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <!-- train section -->
                        <div class="bhoechie-tab-content" id="c-credit_card">
                            <h1>Cartão de Crédito</h1>
                            <hr/>
                            <div class="row">

                                <form action="{VALIDAPAGAMENTO}" class="form-horizontal" method="post" id="pay"
                                      name="pay">
                                    <fieldset>
                                        <ul>
                                            <div class="form-group">
                                                <li>
                                                    <label class="control-label col-sm-3 customer-custom-label"
                                                           for="email">Email: </label>

                                                    <div class="col-sm-4">
                                                        <input class="form-control" id="email" name="email" value=""
                                                               type="email"
                                                               placeholder="{email}"/>
                                                    </div>
                                                </li>
                                            </div>

                                            <div class="form-group">
                                                <li>
                                                    <label class="control-label col-sm-3 customer-custom-label"
                                                           for="cardNumber">Número do Cartão:</label>
                                                    <div class="col-sm-4">
                                                        <input class="form-control" type="text" id="cardNumber"
                                                               data-checkout="cardNumber"
                                                               placeholder="4509 9535 6623 3704"/>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="form-group">
                                                <li>
                                                    <label class="control-label col-sm-3 customer-custom-label"
                                                           for="securityCode">Código de Segurança:</label>
                                                    <div class="col-sm-2">
                                                        <input class="form-control" type="text" id="securityCode"
                                                               data-checkout="securityCode"
                                                               placeholder="123"/>
                                                    </div>
                                                </li>
                                            </div>

                                            <div class="form-group">
                                                <li>
                                                    <label class="control-label col-sm-3 customer-custom-label"
                                                           for="cardExpirationMonth">Mês de Vencimento:</label>
                                                    <div class="col-sm-2">
                                                        <input class="form-control" type="text" id="cardExpirationMonth"
                                                               data-checkout="cardExpirationMonth" maxlength="2"
                                                               placeholder="12"/>
                                                    </div>
                                                </li>
                                            </div>

                                            <div class="form-group">
                                                <li>
                                                    <label class="control-label col-sm-3 customer-custom-label"
                                                           for="cardExpirationYear">Ano de Vencimento:</label>
                                                    <div class="col-sm-2">
                                                        <input class="form-control" type="text" id="cardExpirationYear"
                                                               data-checkout="cardExpirationYear" maxlength="4"
                                                               placeholder="2017"/>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="form-group">
                                                <li>
                                                    <label class="control-label col-sm-3 customer-custom-label"
                                                           for="cardholderName">Bandeira do Cartão:</label>
                                                    <div class="col-md-9">
                                                        <label class="radio-inline">
                                                            <input type="radio" id="cardholderName"
                                                                   name="cardholderName"  data-checkout="cardholderName"
                                                                   value="visa"> <img
                                                                    class="img-responsive"
                                                                    src="<?php echo base_url('assets/img/visa.png') ?>">
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="cardholderName" data-checkout="cardholderName"
                                                                   name="cardholderName" value="mastercard"> <img
                                                                    class="img-responsive"
                                                                    src="<?php echo base_url('assets/img/mastercard.png') ?>"
                                                                    width="50" height="50">
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="cardholderName" data-checkout="cardholderName"
                                                                   name="cardholderName" value="amex"> <img
                                                                    class="img-responsive"
                                                                    src="<?php echo base_url('assets/img/american-express.png') ?>"
                                                                    width="50" height="50">
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="cardholderName" data-checkout="cardholderName"
                                                                   name="cardholderName" value="hipercard"><img
                                                                    class="img-responsive"
                                                                    src="<?php echo base_url('assets/img/cartao-de-credito-hipercard.png') ?>"
                                                                    width="50" height="50">
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" id="cardholderName" data-checkout="cardholderName"
                                                                   name="cardholderName" value="elo"> <img
                                                                    class="img-responsive"
                                                                    src="<?php echo base_url('assets/img/logo-elo.jpg') ?>"
                                                                    width="50" height="50">
                                                        </label>
                                                    </div>

                                                </li>
                                            </div>
                                            <div class="form-group">
                                                <li>
                                                    <!--<label for="docType">Document type:</label>-->
                                                    <!--<select id="docType" data-checkout="docType"></select>-->
                                                    <input data-checkout="docType" type="hidden" value="CPF"/>
                                                </li>
                                            </div>
                                            <div class="form-group">
                                                <li>
                                                    <label class="control-label col-sm-3 customer-custom-label"
                                                           for="docNumber">CPF:</label>
                                                    <div class="col-md-4">
                                                        <input class="form-control" type="text" id="docNumber"
                                                               data-checkout="docNumber"
                                                               placeholder="12345678"/>
                                                    </div>
                                                </li>
                                            </div>
                                            <!-- inicio código opcional para vender parcelado -->
                                            <input type="hidden" id="amount" name="amount" value="{valor}"/>
                                            <div class="form-group">
                                                <li>
                                                    <label class="control-label col-sm-3 customer-custom-label"
                                                           for="installments">Parcelamento:</label>
                                                    <div class="col-md-4">
                                                        <select class="form-control" id="installments"
                                                                name="installments"></select>
                                                    </div>
                                                </li>
                                            </div>
                                            <div class="form-group" style="display: none;">
                                                <li>
                                                    <!-- bancos emissores, não é necessário no brasil -->
                                                    <!--<label for="issuer">Issuer:</label>-->
                                                    <select class="form-control" id="issuer" name="issuer"></select>
                                                </li>
                                            </div>
                                            <!-- fim código opcional para vender parcelado -->

                                        </ul>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-10">
                                                <button type="submit" id="btn-cnf" class="btn btn-success btn-sm">Confirmar!</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>

                            </div>
                        </div>

                        <!-- this must be the last div -->
                        <div class="bhoechie-tab-content active">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h3 class="text-muted">Selecione a forma de pagamento</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</div>
{/BLC_PRODUTOS}

<style>
    /*  bhoechie tab */

    div.bhoechie-tab-container {
        z-index: 10;
        background-color: #ffffff;
        padding: 0 !important;
        border-radius: 4px;
        -moz-border-radius: 4px;
        border: 1px solid #ddd;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        background-clip: padding-box;
        opacity: 0.97;
        filter: alpha(opacity=97);
    }

    div.bhoechie-tab-menu {
        padding-right: 0;
        padding-left: 0;
        padding-bottom: 0;
    }

    div.bhoechie-tab-menu div.list-group {
        margin-bottom: 0;
    }

    div.bhoechie-tab-menu div.list-group > a {
        margin-bottom: 0;
    }

    div.bhoechie-tab-menu div.list-group > a .glyphicon,
    div.bhoechie-tab-menu div.list-group > a .fa {
        color: #2B8C82;
    }

    div.bhoechie-tab-menu div.list-group > a:first-child {
        border-top-right-radius: 0;
        -moz-border-top-right-radius: 0;
    }

    div.bhoechie-tab-menu div.list-group > a:last-child {
        border-bottom-right-radius: 0;
        -moz-border-bottom-right-radius: 0;
    }

    div.bhoechie-tab-menu div.list-group > a.active,
    div.bhoechie-tab-menu div.list-group > a.active .glyphicon,
    div.bhoechie-tab-menu div.list-group > a.active .fa {
        background-color: #2B8C82;
        /* background-image: #2B8C82; */
        color: #ffffff;

    }

    div.bhoechie-tab-menu div.list-group > a.active:after {
        content: '';
        position: absolute;
        left: 100%;
        top: 50%;
        margin-top: -13px;
        border-left: 0;
        border-bottom: 13px solid transparent;
        border-top: 13px solid transparent;
        border-left: 10px solid #2B8C82;
    }

    div.bhoechie-tab {
        padding-bottom: 35px;
    }

    div.bhoechie-tab-content {
        background-color: #ffffff;
        /* border: 1px solid #eeeeee; */
        padding-left: 20px;
        padding-top: 10px;
        padding-right: 20px;
    }

    div.bhoechie-tab div.bhoechie-tab-content:not(.active) {
        opacity: 0;
        display: none;
    }

    .bhoechie-tab-content h1 {
        color: #35B4A6;
    }

    .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
        text-shadow: 0 -1px 0 # #35B4A6;
        background-image: -webkit-linear-gradient(top, #35B4A6 0%, #35B4A6 100%);
        background-image: -o-linear-gradient(top, #35B4A6 0%, #35B4A6 100%);
        background-image: -webkit-gradient(linear, left top, left bottom, from(#35B4A6), to(#35B4A6));
        background-image: linear-gradient(to bottom, #35B4A6 0%, #35B4A6 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff337ab7', endColorstr='#26847A', GradientType=0);
        background-repeat: repeat-x;
        border-color: #26847A;

    .bro-fade {
        opacity: 1;
        transition: opacity .25s ease-in-out;
        -moz-transition: opacity .25s ease-in-out;
        -webkit-transition: opacity .25s ease-in-out;
    }
</style>