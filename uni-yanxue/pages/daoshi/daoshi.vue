<template>
	<view>
		<view class="lunbo">
			<swiper class="screen-swiper" :class="dotStyle?'square-dot':'round-dot'" :indicator-dots="true"
				:circular="true" :autoplay="true" interval="5000" duration="500">
				<swiper-item v-for="(item,index) in swiperList" :key="index">
					<image :src="item.url" mode="aspectFill" v-if="item.type=='image'"></image>
					<video :src="item.url" autoplay loop muted :show-play-btn="false" :controls="false"
						objectFit="cover" v-if="item.type=='video'"></video>
				</swiper-item>
			</swiper>
		</view>
		<view class="flex">
			<navigator class="flex-sub shadow-warp bg-white padding-sm margin-xs radius" v-for="(item,index) in name" :url="path_url">
				<view>{{item.name}}</view>
			</navigator>
<!-- 			<navigator class="flex-sub shadow-warp bg-white padding-sm margin-xs radius" url="../kecheng02/kecheng02">
				<view>PHP</view>
			</navigator>
			<navigator class="flex-sub shadow-warp bg-white padding-sm margin-xs radius" url="../kecheng02/kecheng02">
				<view>C语言</view>
			</navigator>
			<navigator class="flex-sub shadow-warp bg-white padding-sm margin-xs radius" url="../kecheng02/kecheng02">
				<view>HTML5</view>
			</navigator>
			<navigator class="flex-sub shadow-warp bg-white padding-sm margin-xs radius" url="../dizhi/dizhi">
				<view>+</view>
			</navigator> -->
		</view>
		<view class="tuijian">--推荐老师--</view>
		<view class="cu-card article" :class="isCard?'no-card':''" v-for="(item,index) in teacher" :key="index">
			<view class="cu-item shadow">
				<navigator :url="item.teacher_url">
					<view class="cu-tag bg-white text-df text-gray" style="float: right;">{{item.teacher_details}}</view>
				</navigator>
				<view class="content" style="margin-top: 30rpx;">
					<image :src="item.teacher_image" mode="aspectFill"></image>
					<view class="desc">
						<view class="text-cut text-lg">{{item.teacher_name}}</view>
						<view class="text-content"> {{item.teacher_introduction}}</view>
						<view style="margin-top: -40rpx;">
							<view class="cu-tag text-grey bg-white">{{item.teacher_ping}}</view>
							<view class="cu-tag text-grey bg-white">{{item.teacher_satisfied}}</view>
						</view>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				// 轮播图
				swiperList: [{
					id: 0,
					type: 'image',
					url: '/static/images/书01.jpg'
				}, {
					id: 1,
					type: 'image',
					url: '/static/images/06.jpg',
				}, {
					id: 2,
					type: 'image',
					url: '/static/images/002.jpg'
				}],
				dotStyle: true,
				teacher:[],
				name:[]
			}
		},
		onLoad() {
			uni.request({
				url:"http://127.0.0.1:3000/users/teacher",
				success: (res) => {
					this.teacher = res.data
				}
			}),
			uni.request({
				url:"http://127.0.0.1:3000/users/index_daoshi_name",
				success: (res) => {
					this.name = res.data
				}
			})
		}
	}
</script>

<style>
	page {
		background-color: #f4f4f4;
		font-size: 32rpx;
	}

	.flex {
		text-align: center;
		margin-top: 20rpx;
	}

	.flex-sub {
		text-align: center;
	}

	.tuijian {
		padding: 22rpx;
		margin-top: 22rpx;
		font-size: 38rpx;
		text-align: center;
	}

	.cu-tag:active {
		color: red;
	}
</style>
