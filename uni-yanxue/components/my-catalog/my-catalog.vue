<template>
	<view class="me">
	  <view v-for="(item,index) in catalog" :key="index" @click="path_url(item.path)">
	    <image class="ar" :src="item.catalog_img" />
	    <text class="arrow02">{{item.title}}</text>
	    <image class="arrow01" :src="item.arrow_img"></image>
	  </view>
	</view>
</template>

<script>
	
	export default{
		data(){
			return{
				catalog:[]
			}
		},
		methods:{
			path_url(url){
				uni.navigateTo({
					url
				})
			}
		},
		mounted() {
			uni.request({
				url:"http://127.0.0.1:3000/users/mycatalog",
				success:(res) =>{
					this.catalog=res.data
					
				}
			})
		}
	}
</script>

<style>
	.me {
	  background-color: white;
	  margin: 15rpx 0rpx 15rpx 15rpx;
	  width: 96%;
	}
	.me > view {
	  padding: 20rpx;
	  line-height: 60rpx;
	  border-bottom: 1px solid #efefef;
	  height: 100rpx;
	}
	.me > view:last-child {
	  border: none;
	}
	.ar{
	  float: left;
	  width: 65rpx;
	  height: 65rpx;
	  line-height: 65rpx;
	}
	.arrow02{
	  margin-left: 25rpx;
	  font-size: 13px;
	}
	.arrow01{
	  width: 30rpx;
	  height: 32rpx;
	  float: right;
	  margin-top: 16rpx;
	}
</style>
