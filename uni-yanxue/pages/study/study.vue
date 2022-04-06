<template>
    <view>
        <view class="uni-padding-wrap uni-common-mt">
            <view class="video">
                <video id="myVideo" src="https://img.cdn.aliyun.dcloud.net.cn/guide/uniapp/%E7%AC%AC1%E8%AE%B2%EF%BC%88uni-app%E4%BA%A7%E5%93%81%E4%BB%8B%E7%BB%8D%EF%BC%89-%20DCloud%E5%AE%98%E6%96%B9%E8%A7%86%E9%A2%91%E6%95%99%E7%A8%8B@20200317.mp4"
                    @error="videoErrorCallback" :danmu-list="danmuList" enable-danmu danmu-btn controls></video>
            </view>
        </view>
		<!-- <view>
				<uni-collapse  :accordion="true">
					<uni-collapse-item title="标题文字1">
						<text class="content">折叠内容主体，可自定义内容及样式</text>
					</uni-collapse-item>
					<uni-collapse-item title="标题文字2" thumb="https://vkceyugu.cdn.bspapp.com/VKCEYUGU-dc-site/460d46d0-4fcc-11eb-8ff1-d5dcf8779628.png" :show-animation="true">
						<text class="content">折叠内容主体，可自定义内容及样式</text>
					</uni-collapse-item>
					<uni-collapse-item title="标题文字3" :disabled="true" :open="true">
						<text class="content">默认展开xxxxxxxxxxx</text>
					</uni-collapse-item>
				</uni-collapse>
		</view> -->

    </view>
</template>

<script>
	export default {
	    data() {
	        return {
	            src: '',
	            danmuList: [{
	                    text: '第 1s 出现的弹幕',
	                    color: '#ff0000',
	                    time: 1
	                },
	                {
	                    text: '第 3s 出现的弹幕',
	                    color: '#ff00ff',
	                    time: 3
	                }
	            ],
	            danmuValue: ''
	        }
			
	    },

	    methods: {
	        sendDanmu: function() {
	            this.videoContext.sendDanmu({
	                text: this.danmuValue,
	                color: this.getRandomColor()
	            });
	            this.danmuValue = '';
	        },
	        videoErrorCallback: function(e) {
	            uni.showModal({
	                content: e.target.errMsg,
	                showCancel: false
	            })
	        },
	        // getRandomColor: function() {
	        //     const rgb = []
	        //     for (let i = 0; i < 3; ++i) {
	        //         let color = Math.floor(Math.random() * 256).toString(16)
	        //         color = color.length == 1 ? '0' + color : color
	        //         rgb.push(color)
	        //     }
	        //     return '#' + rgb.join('')
	        // }
			
	    }
	}
</script>

<style lang="scss" scoped>
	.video{
		margin: 22rpx;
	}
	// .content {
	// 		padding: 15px;
	// 		font-size: 14px;
	// 		line-height: 20px;
	// 		background-color: #f9f9f9;
	// 		color: #666;
	// 	}

</style>
