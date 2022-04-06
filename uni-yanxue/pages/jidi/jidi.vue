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
					<navigator url="../aimi/aimi" v-for="(item,index) in local">
						<view class="cu-card article" :class="isCard?'no-card':''">
							<view class="cu-item shadow">
								<view class="content">
									<image :src="item.url" mode="aspectFill" style="margin-top: 35rpx;">
									</image>
									<view class="desc">
										<view class="title">{{item.title}}</view>
										<view class="text-content">{{item.introduce}}</view>
									</view>
								</view>
							</view>
						</view>
					</navigator>
				</view>
				<view v-if="tab==1">
					<navigator url="../aimi/aimi" v-for="(item,index) in all">
						<view class="cu-card article" :class="isCard?'no-card':''">
							<view class="cu-item shadow">
								<view class="content">
									<image :src="item.url" mode="aspectFill" style="margin-top: 35rpx;">
									</image>
									<view class="desc">
										<view class="title">{{item.title}}</view>
										<view class="text-content">{{item.introduce}}</view>
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
				tab: 0,
				order_data: [{
						title: '从化基地',

					},
					{
						title: '全部基地'
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
				dotStyle: true,
				local:[],
				all:[]
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
			uni.request({
				url:"http://127.0.0.1:3000/users/index_jidi_local",
				success: (res) => {
					this.local = res.data
				}
			});
			uni.request({
				url:"http://127.0.0.1:3000/users/index_jidi_all",
				success: (res) => {
					this.all = res.data
				}
			})
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
