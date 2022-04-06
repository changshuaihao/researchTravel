<template>
	<view>
		<view class="first">
			<view class="first01" :class="index==1?'first-active':''" @click="quan">{{all}}</view>
			<view class="first02" :class="index==0?'first-active':''" @click="guan">{{friend}}</view>
		</view>

		<view v-if="index==1">
			<view class="middle"  v-for="(item,index) in records" :key="index">
				<view class="middle01" >
					<image src="../../static/my/04.png"></image>
					<view class="middle01-view">
						<view class="view-01">{{name}}</view>
						<view class="view-02">{{time}}</view>
					</view>
					<view class="middle01-button" @click="guanzhu(name,time,item.input,item.travel_img)">
						+关注
					</view>
				</view>
				<view class="middle02">
					{{item.input}}
				</view>
				<view class="middle03">
					<view class="middle03-view" v-for="(it,ind) in item.travel_img" :key="ind">
							<image :src="it" mode="heightFix"></image>
					</view>
				</view>
				<view class="middle04">
					<view class="middle04-1">
						<image src="../../static/my/转发.png"></image>
						<view>3</view>
					</view>
					<view class="middle04-1">
						<image src="../../static/my/评论.png"></image>
						<view>3</view>
					</view>
					<view class="middle04-1">
						<image src="../../static/my/点赞.png"></image>
						<view>3</view>
					</view>
				</view>
			</view>
		</view>
		<view v-if="index==0">
			<view class="middle"  v-for="(item,index) in guanz" :key="index">
				<view class="middle01" >
					<image src="../../static/my/04.png"></image>
					<view class="middle01-view">
						<view class="view-01">{{item.name}}</view>
						<view class="view-02">{{item.name}}</view>
					</view>
					<view class="middle01-button" >
						+关注
					</view>
				</view>
				<view class="middle02">
					{{item.input}}
				</view>
				<view class="middle03">
					<view class="middle03-view" v-for="(it,ind) in item.travel_img" :key="ind">
							<image :src="it" mode="heightFix"></image>
					</view>
				</view>
				<view class="middle04">
					<view class="middle04-1">
						<image src="../../static/my/转发.png"></image>
						<view>3</view>
					</view>
					<view class="middle04-1">
						<image src="../../static/my/评论.png"></image>
						<view>3</view>
					</view>
					<view class="middle04-1">
						<image src="../../static/my/点赞.png"></image>
						<view>3</view>
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
				all: '全部',
				friend: '朋友',
				records:[],
				guanz:[],
				index:1,
				name:'枸杞黄芪',
				time:'2021/4/13/14:00',
				follow:{},
				a:['a','b']
			}
		},
		methods:{
			guan(){
				this.index=0
			},
			quan(){
				this.index=1
			},
			guanzhu(na,ti,inp,img){
				this.follow.name=na
				this.follow.time=ti
				this.follow.input=inp
				this.follow.travel_img=img
				console.log(this.follow)
				uni.request({
					url: "http://127.0.0.1:3000/users/follow",
					data: {
						follow:this.follow
					},
					method: 'POST',
					success(res) {
						console.log('成功')
					}
				})
				
			}
		},
		onLoad:function(){
			uni.request({
				url:"http://127.0.0.1:3000/users/travel",
				success: (res) => {
					this.records=res.data
					for(let i=0;i<this.records.length;i++){
						let record = this.records[i].travel_img.split(',')
						this.records[i].travel_img = record
					}
				}
			}),
			uni.request({
				url:"http://127.0.0.1:3000/users/guanzhu",
				success: (res) => {
					this.guanz=res.data
					for(let i=0;i<this.guanz.length;i++){
						let guan = this.guanz[i].travel_img.split(',')
						this.guanz[i].travel_img = guan
					}
				}
			})
		}
	}
</script>

<style lang="scss">
	.first {
		width: 100%;
		height: 100rpx;
		display: flex;
		line-height: 100rpx;

		.first01 {
			width: 20%;
			text-align: center;
			margin-left: 30%;
			font-size: 18px;
		}
		.first-active{
			border-bottom-color: #c25b25;
			color: #ff0000;
		}
		.first02 {
			width: 20%;
			text-align: center;
			font-size: 18px;
		}
	}


	.middle {
		width: 90%;
		margin-left: 5%;
		height: 500rpx;
		// background-color: #007AFF;
		.middle01 {
			width: 100%;
			height: 120rpx;
			// background-color: #2C405A;
			display: flex;

			image {
				margin-left: 5%;
				width: 100rpx;
				height: 100rpx;
				margin-top: 10rpx;
				border-radius: 50rpx;
			}

			.middle01-view {
				margin: 15rpx 0 0 40rpx;

				.view-01 {
					font-size: 16px;
					color: #ff0000;
				}

				.view-02 {
					font-size: 12px;
					font-weight: 340;
					margin-top: 5rpx;
				}
			}

			.middle01-button {
				margin: 20rpx 0 0 35%;
				text-align: center;
				border: 1rpx solid #ffaa00;
				border-radius: 10px;
				width: 100rpx;
				height: 50rpx;
				line-height: 50rpx;
				font-size: 11px;
				color: #ffaa00;
			}
		}
		.middle02{
			font-size: 13px;
		}
		.middle03{
			width: 100%;
			// height: 200rpx;
			display: flex;
			// background-color: #007AFF;
		}
		.middle03-view{
			image{
				width: 100%;
				height: 200rpx;
			}
		}
		.middle04{
			width: 100%;
			height: 70rpx;
			line-height: 70rpx;
			display: flex;
			.middle04-1{
				display: flex;
				height: 70rpx;
				line-height: 70rpx;
				width: 33%;
				margin-left: 10%;
				text-align: center;
				padding-top: 10rpx;
				image{
					width: 40rpx;
					height: 40rpx;
					margin-right: 10rpx;
				}
				view{
					margin-top: -10rpx;
					margin-left: 5rpx;
				}
			}
		}
	}
</style>
