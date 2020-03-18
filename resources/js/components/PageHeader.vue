<template>
            <div class="page-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="page-title">{{ mainTitle ? mainTitle : 'Page Header' }}</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="index.html"><i class="la la-home font-20"></i></a>
                            </li>
                            <li class="breadcrumb-item">{{ subTitle ? subTitle : 'Sub Header' }}</li>
                        </ol>
                    </div>
                     <div class="col-md-6">
                            <button v-if="isButtonShow" class="btn btn-success pull-right mt-5" @click="addItem()">Create</button>
                     </div>

                </div>
            </div>
</template>
<script>
export default {
    props: {
        mainTitle: String,
        subTitle: String,
        addItem: Function,
        isButtonShow: false,
    }
}
</script>
