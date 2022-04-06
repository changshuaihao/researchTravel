<template>
	<view>
		<image class="tu01" src="/static/images/02.jpg"></image>
		
		<view class="timu">天空稻田研学基地——从化艾米稻香小镇</view>
		<view class="jie1">
		<view class="jie01">简介：</view>
		<view class="jie02">是以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。
		天空稻田研学依托从化艾米稻香小镇独有的生态农业场景为依托，结合先进的运营模式，完备的课程体系，艾米人工智能科技技术；以互动体验式项目为载体，结合贯穿探究式团队学习方法；从体验、反思、分享、迁移的过程学习中，丰富收获效果。</view>
		</view>
		<view class="tuijian">--课程列表--</view>
		<view class="cu-card article" :class="isCard?'no-card':''">
			<view class="cu-item shadow">
				<navigator url="../aimi/aimi"><view class="cu-tag bg-white text-df text-gray" style="float: right;">详情>></view></navigator>
				<view class="title">艾米天空稻田研学基地</view>
				<view class="content">
					<image src="/static/images/17.jpg"
					 mode="aspectFill"></image>
					<view class="desc">
						<view class="text-content"> 是以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。</view>
						<view class="text-gray text-sm text-right padding">
									<text class="cuIcon-appreciate margin-lr-xs"></text> 10 <text style="margin-left: 30rpx;"></text>
									<text class="cuIcon-favor margin-lr-xs"></text> 20 <text style="margin-left: 30rpx;"></text>
									<text class="cuIcon-messagefill margin-lr-xs"></text> 30 <text style="margin-left: 30rpx;"></text>
								</view>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	
</script>

<style>
	/* pages/aimi/aimi.wxss */
	page {
	  background-color: #f4f4f4;
	  font-size: 32rpx;
	}
	.tu01{
	  width:100%;
	  height:400rpx;
	}
	.timu{
	  height:50rpx;
	  text-align: center;
	  font-size: 38rpx;
	}
	.jie1{
	  width:96%;
	  margin-left: 2%;
	  margin-top: 10rpx;
	}
	.jie01{
	  font-size: 36rpx;
	}
	.jie02{
	  text-align: left;
	  font-size: 34rpx;
	}
	.tuijian {
	  padding: 22rpx;
	  margin-top: 22rpx;
	  font-size: 43rpx;
	  text-align: center;
	  color: #5f5f5f;
	}
	.cu-tag:active{color: red;}
</style>
