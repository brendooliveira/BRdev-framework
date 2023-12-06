<section class="content_home">
    <div class="container">
        <div class="content_home_img"><img src="{{assets("img/logo.svg")}}" alt="Logo tipo {{envget('CONF_TITLE')}}" width="165px"></div>
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="content_home_body">
                    <h1>Excelência em Soluções Tecnológicas</h1>
                    <p>Construindo Parcerias Estratégicas e <br> Projetos de Alta Maturidade para Transformar o Mundo Digital desde 2000</p>

                    <div class="pt-3">
                        <a href="https://wa.me/55" class="btn btn_consulte">Falar agora com um especialista <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div> 
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h_form">Receba nossa apresentção por e-mail</h2>
                        <p class="p_form">Preencha os seus dados para receber o material</p>
                        <hr>
                        <form action="{{url("/send")}}" method="post">

                            <div class="mb-3">
                                <label for="name" class="label">Nome*</label>
                                <input type="text" name="name" class="input" placeholder="Nome*" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="label">E-mail*</label>
                                <input type="email" name="email" class="input" placeholder="E-mail*" id="email">
                            </div>
                            <div class="mb-5">
                                <label for="empresa" class="label">Sua empresa*</label>
                                <input type="text" name="company" class="input" placeholder="Empresa*" id="empresa">
                            </div>

                            <div class="mb-3">
                                <button class="btn btn_consulte w-100 text-center">Receber nossa apresentção</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>