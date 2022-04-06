<template>
	<view>

		<!-- 轮播图 -->
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
		<view class="a">

			<view class="tab">
				<view class="tab-item" :class="tab==index?'active':''" @click="change(index)"
					v-for="(item,index) in order_data" :key="index">
					<!-- <image class="image" :src="item.url" @click="change(index)"></image> -->
					<view class="tab-view" @click="change(index)">{{item.title}}</view>
				</view>
			</view>
			<view class="content01">
				<view v-if="tab==0">


					<navigator url="../aimi/aimi">
						<view class="cu-card article" :class="isCard?'no-card':''">
							<view class="cu-item shadow">
								<!-- <view class="title"><view class="text-cut">无意者 烈火焚身;以正义的烈火拔出黑暗。我有自己的正义，见证至高的烈火吧。</view></view> -->
								<view class="content">
									<image src="/static/images/002.jpg" mode="aspectFill" style="margin-top: 35rpx;">
									</image>
									<view class="desc">
										<view class="title">艾米天空稻田研学基地</view>
										<view class="text-content">以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。
										</view>
									</view>
								</view>
							</view>
						</view>
					</navigator>
					<navigator url="../aimi/aimi">
						<view class="cu-card article" :class="isCard?'no-card':''">
							<view class="cu-item shadow">
								<!-- <view class="title"><view class="text-cut">无意者 烈火焚身;以正义的烈火拔出黑暗。我有自己的正义，见证至高的烈火吧。</view></view> -->
								<view class="content">
									<image src="/static/images/640.jpg" mode="aspectFill" style="margin-top: 35rpx;">
									</image>
									<view class="desc">
										<view class="title">从化碧水湾温泉文化基地</view>
										<view class="text-content">以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。
										</view>
									</view>
								</view>
							</view>
						</view>
					</navigator>
				</view>
				<view v-if="tab==1">
					<navigator url="../aimi/aimi">
						<view class="cu-card article" :class="isCard?'no-card':''">
							<view class="cu-item shadow">
								<view class="content">
									<image src="/static/images/03.jpg" mode="aspectFill" style="margin-top: 35rpx;">
									</image>
									<view class="desc">
										<view class="title">贺兰山岩画遗址公园</view>
										<view class="text-content">以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。
										</view>
									</view>
								</view>
							</view>
						</view>
					</navigator>
					<navigator url="../aimi/aimi">
						<view class="cu-card article" :class="isCard?'no-card':''">
							<view class="cu-item shadow">
								<view class="content">
									<image src="/static/images/06.jpg" mode="aspectFill" style="margin-top: 35rpx;">
									</image>
									<view class="desc">
										<view class="title">荆门爱飞客航空小镇</view>
										<view class="text-content">以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。
										</view>
									</view>
								</view>
							</view>
						</view>
					</navigator>
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
				// title: 'Hello',
				// swipers:[]
				tab: 0,
				order_data: [{
						title: '从化机构',

					},
					{
						title: '机构列表'
					}
				],
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
				}, {
					id: 3,
					type: 'image',
					url: '/static/images/07.jpg'
				}],
				dotStyle: true


			}
		},
		props: ['title'],
		methods: {
			change(index) {
				console.log(index),
					this.tab = index
			}
		},
		onLoad() {

		}
	}
</script>

<style lang="scss">
	page {
		display: flex;
		flex-direction: column;
		height: 100%;
		/* background-color: #f4f4f4; */
	}

	/* 轮播图 */
	.home {
		swiper {
			width: 100%;
		}

		image {
			width: 100%;
			height: 400rpx;
		}
	}

	.a {
		border-radius: 30rpx 30rpx 0 0;
		background-color: #F4F4F4;
		margin-top: 20rpx;
	}

	.tab {
		display: flex;
		margin-top: 20rpx;

	}

	.tab-item {
		flex: 1;
		font-size: 10pt;
		text-align: center;
		line-height: 72rpx;
		margin: 10rpx;
	}

	.content01 {
		flex: 1;
	}

	.tab-item.active {
		color: #000;
		background-color: #f4f4f4;
		border-bottom: 2rpx solid #FFCE35;
		color: #FFCE35;
	}
</style>
