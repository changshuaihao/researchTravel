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

		<!-- 四宫格 -->
		<mylist></mylist>
		<!-- <navigator url="../aimi/aimi"> -->
		<view class="yan">---研学新闻---</view>
		<navigator url="../aimi/aimi" v-for="(item,index) in index_news" :key="index"><view class="cu-card article" :class="isCard?'no-card':''">
							<view class="cu-item shadow">
								<view class="content" style="margin-top: 30rpx;">
									<image :src="item.url" mode="aspectFill"></image>						
									<view class="desc">
										<view class="text-cut text-lg">{{item.title}}</view>
										<view class="text-content"> {{item.introduce}}</view>
										<view style="margin-top: -40rpx;"></view>
									</view>
								</view>
							</view>
		</view></navigator>
<!-- 		<navigator url="../aimi/aimi"><view class="cu-card article" :class="isCard?'no-card':''">
							<view class="cu-item shadow">
								<view class="content" style="margin-top: 30rpx;">
									<image src="/static/images/17.jpg" mode="aspectFill"></image>						
									<view class="desc">
										<view class="text-cut text-lg">艾米天空稻田研学基地</view>
										<view class="text-content"> 是以艾米生态稻田种植基地为载体，以生态农业与农业科技两大板块为知识体系，打造稻田上的STEAM教育。</view>
										<view style="margin-top: -40rpx;">
										</view>
									</view>
								</view>
							</view>
		</view></navigator> -->
		
	</view>
	</view>
	</view>
</template>

<script>
	import mylist from '../../components/list/list.vue'

	export default {
		data() {
			return {

				// title: 'Hello',
				// swipers:[]	,
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
				}, {
					id: 3,
					type: 'image',
					url: '/static/images/07.jpg'
				}],
				dotStyle: true,
				index_news:[]
			}
		},
		components: {
			mylist //调用前面标签<mylist> list.vue文件

		},
		// onLoad() {
		// 	//模拟ajax获取数据，uni.request({...});注意回调的this指向
		// 				this.swipers=['https://app-file.beitaichufang.com/img/H5/web/banner/banner20.jpg',
		// 				"https://app-file.beitaichufang.com/img/H5/web/banner/banner21.jpg",
		// 				"https://app-file.beitaichufang.com/img/H5/web/banner/banner22.jpg",
		// 				"https://app-file.beitaichufang.com/img/H5/web/banner/banner23.jpg"
		// 				];


		// },
		methods: {

		},
		onLoad() {
			uni.request({
				url:"http://127.0.0.1:3000/users/index_news",
				success: (res) => {
					this.index_news = res.data
					console.log(res.data)
				}
			})
		}
	}
</script>

<style lang="scss">
	page {
		background-color: #f4f4f4;
		font-size: 32rpx;
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


	/* 四宫格 */



	.yan {
		padding: 22rpx;
		margin-top: 22rpx;
		font-size: 43rpx;
		text-align: center;
	}

	.cu-tag:active {
		color: red;
	}
</style>
