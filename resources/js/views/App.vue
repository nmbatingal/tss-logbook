<template>
    <el-container>
        <el-header><h4 class="text-white p-4 float-right">{{clockWidget.time}} {{clockWidget.date}}</h4></el-header>
        <el-main>
            <router-view></router-view>
        </el-main>
    </el-container>
</template>
<script>
    import dayjs from 'dayjs'

    export default {
        data() {
            return {
                clockWidget: {
                    time: '...',
                    date: '. . .',
                    updater: null,
                    showSeparator: true
                }
            }
        },
        created() {
            this.clockWidget.updater = setInterval(() => {
                const { showSeparator } = this.clockWidget
                this.clockWidget.time = dayjs().format(`h${showSeparator ? ':' : ' '}mm A`)
                this.clockWidget.date = dayjs().format('dddd, D MMMM')
                this.clockWidget.showSeparator = !showSeparator
                }, 507)
        },
        beforeDestroy () {
            clearInterval(this.clockWidget.updater)
        },
    }
</script>