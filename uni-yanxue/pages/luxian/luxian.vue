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
			<navigator class="flex-sub shadow-warp bg-white padding-sm margin-xs radius" v-for="(item,index) in route" :key="index" :url="item.url">
				<view>{{item.name}}</view>
			</navigator>
		</view>
		<view class="flex">
			<navigator class="flex-sub shadow-warp bg-white padding-sm margin-xs radius" v-for="(item,index) in route2" :key="index" :url="item.url">
				<view>{{item.name}}</view>
			</navigator>
		</view>
		<view class="tuijian">--推荐路线--</view>
		<navigator url="../luxian/xian" v-for="(item,index) in name" :key="index">
			<view class="cu-card article" :class="isCard?'no-card':''">
				<view class="cu-item shadow">
					<view class="content" style="margin-top: 30rpx;">
						<image :src="item.Route_img" mode="aspectFill"></image>
						<view class="desc">
							<view class="text-cut text-lg">{{item.Route_name}}</view>
							<view class="text-content"> {{item.Route_introduction}}</view>
							<view style="margin-top: -40rpx;">
								<view class="cu-tag bg-white"> {{item.Route_address}}</view>
							</view>
						</view>
					</view>
				</view>
			</view>
		</navigator>
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
				route:[],
				route2:[],
				name:[]
			}
		},
		onLoad() {
			uni.request({
				url:"http://127.0.0.1:3000/users/route_name",
				success: (res) => {
					this.route = res.data
				}
			}),
			uni.request({
				url:"http://127.0.0.1:3000/users/route_name2",
				success: (res) => {
					this.route2 = res.data
				}
			}),
			uni.request({
				url:"http://127.0.0.1:3000/users/route",
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
		font-size: 43rpx;
		text-align: center;
	}
</style>
