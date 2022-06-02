<template>
        <div class="m-auto w-100 h-100">
            <div id="headerwrap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 ml-auto mr-auto">
                            <div id="fondoTrans">
                                <h2>Bienvenido</h2>
                                <h1>USUARIO</h1>
                                <h2>to Organized</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
<style>
   #headerwrap {
        background: url(https://pixabay.com/get/gfe45612d6b0b7e71cdc268c753b95ac9953a26043996336ce92df0a15b47fb122b850e168e9bc791a4b0aa331a94a126.jpg) no-repeat center top;
        margin-top: -70px;
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
}
</script>
