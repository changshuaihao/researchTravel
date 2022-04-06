<template>
	<view>
		<!-- <swiper class="swiper" indicator-color="rgba(255,255,255,.5)" indicator-active-color="#fff" 
		indicator-dots circular autoplay interval="3000">
		  <swiper-item class="it">
		    <image src="/static/images/书01.jpg"/>
		  </swiper-item>
		  <swiper-item class="it">
		    <image src="/static/images/书02.jpg"/>
		  </swiper-item>
		  <swiper-item class="it">
		    <image src="/static/images/书03.jpg"/>
		  </swiper-item>
		</swiper> -->
<view class="lunbo">
	<swiper class="screen-swiper" :class="dotStyle?'square-dot':'round-dot'" :indicator-dots="true" :circular="true"
			 :autoplay="true" interval="5000" duration="500">
				<swiper-item v-for="(item,index) in swiperList" :key="index">
					<image :src="item.url" mode="aspectFill" v-if="item.type=='image'"></image>
					<video :src="item.url" autoplay loop muted :show-play-btn="false" :controls="false" objectFit="cover" v-if="item.type=='video'"></video>
				</swiper-item>
	</swiper>
</view>	
		<!-- <view class="view-01">
		  <button>管理</button>
		  <button>原型</button>
		  <button>职业</button>
		  <button bindtap="jiazai">+</button>
		</view> -->
<view class="flex">
				<view class="flex-sub shadow-warp bg-white padding-sm margin-xs radius">管理</view>
				<view class="flex-sub shadow-warp bg-white padding-sm margin-xs radius">原型</view>
				<view class="flex-sub shadow-warp bg-white padding-sm margin-xs radius">职业</view>
				<navigator class="flex-sub shadow-warp bg-white padding-sm margin-xs radius" url="../kecheng01/kecheng01"><view>+</view></navigator>
</view>
		<view class="kecheng">
		    <image class="tu1" src="/static/images/11.jpg"></image>
		    <view class="timu1">JAVA高级互联网架构师
		      <image src="/static/images/爱心.png" class="ai"></image>
		    <button class="button01">紧贴实战</button>
		    <button class="button02">专业指导</button>
		    <!-- <image src="/images/爱心.png" class="ai"></image> -->
		    <view class="qian">￥21000 <button class="button03">报名</button></view> 
		    </view>
		  </view>
		  <view class="kecheng01">
		    <image class="tu1" src="/static/images/12.jpg"></image>
		    <view class="timu1">成人英语学习、旅游
		      <image src="/static/images/爱心 (1).png" class="ai01"></image>
		    <button class="button01">紧贴实战</button>
		    <button class="button02">专业指导</button>
		    <!-- <image src="/images/爱心.png" class="ai"></image> -->
		    <view class="qian">￥2400 <button class="button03">报名</button></view> 
		    </view>
		  </view>
	</view>
</template>

<script>
	export default{
		data() {
			return{
				// 轮播图
				swiperList: [{
								id: 0,
								type: 'image',
								url: '/static/images/书01.jpg'
								}, {
								id: 1,
								type: 'image',
								url: '/static/images/书02.jpg',
								}, {
								id: 2,
								type: 'image',
								url: '/static/images/书03.jpg'
								}],
							dotStyle: true
					
				}
			}
		}
	
</script>

<style>
	
	page {
	  background-color: #f4f4f4;
	  font-size: 32rpx;
	}
	
	.flex{text-align: center;margin-top: 20rpx;}
	.flex-sub{text-align: center;}
	.kecheng,.kecheng01 {
	  background-color: #fff;
	  display: flex;
	  flex-direction: row;
	  margin-top: 20rpx;
	  height:270rpx;
	  width:95%;
	  margin-left: 2.5%;
	}
	.kecheng > image,.kecheng01 > image{
	  padding-left: 20rpx;
	  padding-top: 20rpx;
	  width: 210rpx;
	  height: 210rpx;
	  /* border-radius: 50%;  */
	}
	.button01{
	  flex: 1;
	  margin-left: 2rpx;
	  margin-top:15rpx;
	  background-color:#fff;
	  width: 170rpx;
	  font-size: 11px;
	  height: 65rpx;
	  text-align: center;
	  color: red;
	}
	.button02{
	    flex: 1;
	  margin-left: 185rpx;
	  background-color:#fff;
	  width: 170rpx;
	  font-size: 11px;
	  height: 65rpx;
	  text-align: center;
	  margin-top: -65rpx;
	  color: red;
	}
	
	.timu1{
	  font-size: 36rpx;
	  padding-left: 30rpx;
	  padding-top: 20rpx;
	  /* text-align: center; */
	  
	}
	.ai{
	  width:50rpx;
	  height:50rpx;
	 padding-left: 10rpx;
	 /* padding-top:20rpx; */
	}
	.ai01{
	  width:50rpx;
	  height:50rpx;
	 padding-left: 60rpx;
	 /* padding-top:20rpx; */
	}
	.qian{
	  padding-left: 20rpx;
	  padding-top: 40rpx;
	  font-size: 36rpx;
	  color: red;
	}
	.button03{
	    flex: 1;
	  margin-left: 280rpx;
	  background-color:bisque;
	  width: 150rpx;
	  font-size: 11px;
	  height: 70rpx;
	  text-align: center;
	  margin-top: -55rpx;
	  color: red;
	}
</style>
