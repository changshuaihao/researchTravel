<template>
	<view>
		<!-- 订单用v-for循环做 -->
		<view class="tab">
			<view class="tab-item" :class="tab==index?'active':''" @click="change(index)" v-for="(item,index) in order_data" :key="index">
				<image class="image" :src="item.url" @click="change(index)"></image>
				<view class="tab-view" @click="change(index)" >{{item.title}}</view>
			</view>
		</view>
		<view class="content">
			<view v-if="tab==0">
				<image class="t" src="../../static/my/没有数据.png"/>
			</view>
			<view v-if="tab==1">
				111
			</view>
			<view v-if="tab==2">
				22
			</view>
			<view v-if="tab==3">
				待退款
			</view>
			<view v-if="tab==4">
				55
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				tab: 0,
				order_data:[
					{
						url:'../../static/my/订单.png',
						title:'全部'
					},
					{
						url:'../../static/my/待支付%20(1).png',
						title:'待支付'
					},
					{
						url:'../../static/my/出行.png',
						title:'待出行'
					},
					{
						url:'../../static/my/首页-待评价.png',
						title:'待评价'
					},
					{
						url:'../../static/my/待退款.png',
						title:'待退款'
					}
				]
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

<style>
	page {
		display: flex;
		flex-direction: column;
		height: 100%;
	}

	.tab {
		display: flex
	}

	.tab-item {
		flex: 1;
		font-size: 10pt;
		text-align: center;
		line-height: 72rpx;
		border-bottom: 6rpx solid #eee;
	}

	.content {
		flex: 1;
	}

	.content>swiper {
		height: 100%;
	}

	.tab-item.active {
		color: #c25b25;
		border-bottom-color: #c25b25;
	}

	.image {
		width: 84rpx;
		height: 70rpx;
	}

	.tab-view {
		margin-top: -40rpx;
		margin-bottom: -10rpx;
	}

	.t {
		margin-top: 100rpx;
		width: 70%;
		margin-left: 15%;
		height: 350rpx;
	}
</style>
