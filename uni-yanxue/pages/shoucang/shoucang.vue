<template>
	<view>
		 <navigator url="../kecheng02/kecheng02"><view class="cu-card article" :class="isCard?'no-card':''">
		  	<view class="cu-item shadow">
		  		<view class="content" style="margin-top: 30rpx;">
		  			<image src="/static/shu/01.png" mode="aspectFill"></image>						
		  			<view class="desc">
		  				<view class="text-cut text-lg">计算机</view>
		  				<view class="text-content"> 是以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。</view>
					</view>
				</view>
			</view>
		</view></navigator>
	</view>
</template>

<script>
	export default {
		data() {
			return {
			
			}
		},
		methods: {
		
	}
	}
</script>

<style>
	page {
	  background-color: #f4f4f4;
	  font-size: 32rpx;
	}

	.qian{
	  padding-left: 20rpx;
	  padding-top: 40rpx;
	  font-size: 36rpx;
	  color: red;
	}
	.cu-btn{
		margin-left: 150rpx;
	}
</style>
