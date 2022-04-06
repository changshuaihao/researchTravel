<template>
	<view>
		<view class="shezhi">
		  <view class="shezhi01" @click="changename">修改昵称</view>
		  <image class="arrow01" src="../../static/my/右箭头.png"></image>
		</view>
		<view class="hr"></view>
		<view class="shezhi"  >
		  <view class="shezhi01">常见问题与反馈</view>
		  <image class="arrow01" src="../../static/my/右箭头.png"></image>
		</view>
		<view class="hr"></view>
		<button class="last">切换账号</button>
		<button class="last01" >退出登录</button>
	</view>
</template>

<script>
	export default{
		methods:{
			changename(){
				uni.navigateTo({
					url:'../my/change-name'
				})
			}
		}
	}
</script>

<style>
	.shezhi{
	  height: 60rpx;
	  margin: 15rpx 0rpx 30rpx 30rpx;
	  width: 93%;
	}
	.shezhi01{
	  width: 50%;
	  height: 60rpx;
	  float: left;
	  font-size: 15px;
	}
	.hr{
	  width: 100%;
	  height: 5rpx;
	  background-color: #beb3b3;
	  margin-top: -30rpx;
	}
	.last{
	  border-radius: 50px;
	  margin-top: 600rpx;
	  width: 80%;
	  text-align: center;
	  margin-left: 10%;
	  background-color: #FFCE35;
	
	}
	.last01{
	  border-radius: 50px;
	  margin-top: 20rpx;
	  width: 80%;
	  text-align: center;
	  margin-left: 10%;
	}
	.arrow01{
	  width: 30rpx;
	  height: 32rpx;
	  float: right;
	  margin-top: 16rpx;
	}
</style>
