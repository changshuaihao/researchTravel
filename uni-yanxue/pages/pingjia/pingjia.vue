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
		<!-- 订单用v-for循环做 -->
		<view class="tab">
			<view class="tab-item" :class="tab==index?'active':''" @click="change(index)"
				v-for="(item,index) in order_data" :key="index">
				<!-- <image class="image" :src="item.url" @click="change(index)"></image> -->
				<view class="tab-view" @click="change(index)">{{item.title}}</view>
			</view>
		</view>
		<view class="content01">
			<view v-if="tab==0">
				<view v-for="(item,index) in jigou" :key="index">
					<view class="cu-card case" :class="isCard?'no-card':''">
						<view class="cu-item shadow">
							<view class="image">
								<image :src="item.img" style="height:350rpx;"></image>
								<view class="cu-tag bg-red">{{item.no}}</view>
								<view class="cu-bar bg-shadeBottom"> <text
										class="text-cut">{{item.introduce}}</text></view>
							</view>
							<view class="cu-list menu-avatar">
								<view class="cu-item">
									<image class="cu-avatar round lg" :src="item.url" mode=""></image>
									<view class="content flex-sub">
										<view class="text-black">{{item.jigou}}</view>
										<view class="text-gray text-sm flex justify-between">{{item.QQ}}</view>
										<view class="text-gray text-sm flex justify-between">{{item.dianhua}}</view>
									</view>
								</view>
							</view>
						</view>
					</view>
				</view>
			</view>
		</view>

		<view v-if="tab==1">
			<view class="cu-card article" :class="isCard?'no-card':''" v-for="(item,index) in teacher" :key="index">
				<view class="cu-item shadow">
					<view class="cu-tag bg-red" style="float: right;">{{item.no}}</view>
					<view class="content" style="margin-top: 30rpx;">
						<image :src="item.url" mode="aspectFill"></image>
						<view class="desc">
							<view class="text-cut">{{item.name}}</view>
							<view class="text-content"> {{item.introduct}}</view>
							<view style="margin-top: -40rpx;">
								<view class="cu-tag text-grey bg-white">{{item.dp}}</view>
								<view class="cu-tag text-grey bg-white">{{item.sate}}</view>
							</view>
						</view>
					</view>
				</view>
			</view>
		</view>
		<view v-if="tab==2">
			<view class="cu-card dynamic" :class="isCard?'no-card':''" v-for="(item,index) in jidi" :key="index">
				<view class="cu-item shadow">
					<view class="cu-list menu-avatar">
						<view class="cu-item">
						<!-- 	<view class="cu-avatar round lg" :style="background-image:url({{item.url}});">
								<view class='cu-tag badge'>{{item.no}}</view>
							</view> -->
							<image :src="item.url" class="cu-avatar round lg" mode="">
							
							</image>
							<view class='vv'>{{item.no}}</view>
							<view class="content flex-sub">
								<view style="font-size: 32rpx;">{{item.name}}</view>
								<view class="text-gray text-sm flex justify-between">
									{{item.dizi}}
								</view>
							</view>
						</view>
					</view>
					<view class="text-content">
						{{item.introduce}}
					</view>
					<view class="grid flex-sub padding-lr" :class="isCard?'col-3 grid-square':'col-1'">
						<view class="bg-img " :class="isCard?'':'only-img'"
							style="background-image:url(/static/images/002.jpg);" v-for="(item,index) in isCard?9:1"
							:key="index">
						</view>
						<view style="height:20rpx;"></view>
					</view>
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
				tab: 0,
				order_data: [{
						title: '机构评价排名',

					},
					{
						title: '导师评价排名'
					},
					{
						title: '基地评价排名'
					}
				],
				swiperList: [{
					id: 0,
					type: 'image',
					url: '/static/images/01.jpg'
				}, {
					id: 1,
					type: 'image',
					url: '/static/images/17.jpg',
				}, {
					id: 2,
					type: 'image',
					url: '/static/images/18.jpg'
				}],
				dotStyle: true,
				jigou:[],
				teacher:[],
				jidi:[]
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
				url:"http://127.0.0.1:3000/users/pai_jigou",
				success: (res) => {
					this.jigou = res.data
				}
			}),
			uni.request({
				url:"http://127.0.0.1:3000/users/pai_teacher",
				success: (res) => {
					this.teacher = res.data
				}
			}),
			uni.request({
				url:"http://127.0.0.1:3000/users/pai_jidi",
				success: (res) => {
					this.jidi = res.data
				}
			})
		}
	}
</script>

<style>
	page {
		display: flex;
		flex-direction: column;
		height: 100%;
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
		/* border-bottom: 6rpx solid #eee;	 */
		/* margin-top:30rpx; */
		border: 1rpx solid #C0C0C0;
		margin: 10rpx;
		background-color: #FFFFFF;
	}

	.content01 {
		flex: 1;
	}

	/* .content01>swiper {
		height: 100%;
	} */

	.tab-item.active {
		color: #000;
		/* border-bottom-color: #c25b25; */
		background-color: #FFCE35;
		border: 1rpx solid #FFCE35;
	}

	/* .tu1{margin-top: 60rpx;text-align: center;}	 */
	.text-cut {
		font-size: 34rpx;
	}

	#cu-tag {
		float: right;
	}
	.vv{
		border-radius: 10upx;
		position: absolute;
		top: 20upx;
		right: 30upx;
		font-size: 10px;
		padding: 0upx 10upx;
		text-align: center;
		height: 28upx;
		color: #ffffff;
		background: #ff0000;
		width: 40px;
		height: 17px;
		line-height: 17px;
	}
	/* .content{margin-top: -5rpx;} */
	/* .text-content{margin-left: 10rpx;} */
</style>
