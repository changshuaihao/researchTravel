<template>
	<view class="last" bindtap="lvxingjilu" @click="path">
	  <view class="last04">
	    <view class="last01"> {{title01}}</view>
	    <view class="last02">{{title02}}</view>
	  </view>
	  <input type="button" class="last03" value="立即发布" />
	</view>
</template>

<script>
	export default{
		data(){
			return {
				title01:'旅行记录',
				title02:'分享你的专属旅行记忆',
				
			}
		},
		methods:{
			path(){
				uni.navigateTo({
					url:'../../pages/my/travel-records'
				})
			}
		}
	}
</script>

<style>
	.last{
	  background-color: white;
	  margin: 15rpx 0rpx 15rpx 15rpx;
	  width: 96%;
	  height: 120rpx;
	  border-radius: 15rpx;
	}
	.last01{
	  font-size: 17px;
	  font-weight: 800;
	  margin-left: 20rpx;
	  padding-top: 20rpx;
	}
	.last02{
	  font-size: 10px;
	  font-weight: 200;
	  padding-left: 20rpx;
	  padding-left: 20rpx;
	}
	.last03{
	  float: right;
	  background-color: yellow;
	  width: 170rpx;
	  height: 40rpx;
	  text-align: center;
	  border-radius: 80rpx;
	  font-size: 12px;
	  margin-top: 30rpx;
	  margin-right: 30rpx;
	}
	.last04{
	  float: left;
	}
</style>
