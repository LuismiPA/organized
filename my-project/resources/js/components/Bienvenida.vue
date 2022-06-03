<template>
    <div class="m-auto w-100 h-100">
        <div id="headerwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 ml-auto mr-auto">
                        <div id="fondoTrans">
                            <h2>Bienvenido a Organized</h2>
                            <h1>{{usuario.name}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
   #headerwrap {
        background: url('../../../public/assets/images/casa.jpg') no-repeat center top;
        padding-top: 250px;
        text-align: center;
        background-attachment: relative;
        background-position: center center;
        min-height: 650px;
        width: 100%;
        background-size: 100%;
        background-size: cover;
    }

    #headerwrap h1 {
        color: #ffffff;
        padding-top: 10px;
        padding-bottom: 20px;
        letter-spacing: 4px;
        font-size: 80px;
        font-weight: bold;
    }

    #headerwrap h2 {
        font-weight: 400;
        color: #ffffff
    }

    #fondoTrans {
        background-color: rgba(0, 0, 0, 0.5);
        box-sizing: border-box;
    }

        #headerwrap {
            padding-top: 180px;
        }

</style>

<script>

export default {
    name: 'perfil',
    data() {
        return {
            usuario: []
        }
    },
    created() {
        axios.get('/user/detalles').then(response => this.usuario = response.data);
    },
}
</script>
