<!-- page content -->
<div class="" role="main">
    <div class="page-title">
        <div class="title_left">
            <h3>Perfil do Usuário</h3>
        </div>


    </div>

    <div class="clearfix"></div>

    {BLC_DADOS}
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view" src="{URLFOTO}"
                                     alt="Avatar" title="Change the avatar">
                            </div>
                        </div>


                        <h3>{NOME}</h3>

                        <ul class="list-unstyled user_data">
                            <li>
                                <i class="fa fa-map-marker user-profile-icon"> {EMAILUSUARIO}</i>
                            </li>
                            <li>
                                <i class="fa fa-briefcase user-profile-icon"> {TIPOUSUARIO}</i>
                            </li>
                        </ul>

                        <a class="btn btn-success" href="{URLEDITAR}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        <br/>


                        <div class="col-md-9 col-sm-9 col-xs-12">


                            <!-- start of user-activity-graph -->
                            <div id="graph_bar" style="width:100%; height:280px;"></div>
                            <!-- end of user-activity-graph -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        {/BLC_DADOS}
    </div>
    <!-- /page content -->
