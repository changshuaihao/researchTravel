<template>
	<view>
<image :src="url" mode="" @click="previewImage(url)"></image>	
	</view>
</template>
<script>
	export default {
		
		data(){
		    return {
		       url: '../../static/shu/01.png'
		    }
		},
		methods: {
		    // 预览图片
		    previewImage(url){
		        let photoList = [];
		        photoList.push(img);
		        uni.previewImage({
		            current: 0,
		            urls: photoList // 图片路径必须是一个数组
		        });
		      },
		}

		}
		
	
</script>

<style lang="scss">
	
	.main-wrap{
	    width: 100%;
	    height: 100%;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	    .img-wrap{
	        width: 100rpx;
	        height: 100rpx;
	        image{
	            display: block;
	            width: 100%;
	            height: 100%;
	        }
	    }
	    
	}
</style>
