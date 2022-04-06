<template>
	<view>
		<view class="cu-card dynamic" :class="isCard?'no-card':''">
			<view class="cu-item shadow">
				<view class="cu-list menu-avatar">
					<view class="cu-item">
						<!-- <view class="cu-avatar round lg" style="background-image:url(../../static/shu/01.png);"></view> -->
						<image class="cu-avatar round lg" :src="ke[0].url" mode=""></image>
						<view class="content flex-sub">
							<view>{{ke[0].name}}</view>
							<view class="text-gray text-sm flex justify-between">
								{{ke[0].time}}
							</view>
						</view>
					</view>
				</view>
				<view>
					<p class="money">￥{{ke[0].price}}<br><span class="money_1">{{ke[0].gou}}</span></p>
				</view>
				<view class="text-content">
					{{ke[0].content}}
				</view>
				<view class="grid flex-sub padding-lr" :class="isCard?'col-3 grid-square':'col-1'">
					<view class="bg-img " :class="isCard?'':'only-img'"
						style="background-image:url(../../static/images/01.jpg);" v-for="(item,index) in isCard?9:1"
						:key="index">
					</view>
				</view>
				<view class="padding flex flex-wrap justify-between align-center bg-white ">
					<image class="collection" src="/static/images/xin.png" v-if="ke[0].showUpImg" @click="changeImg"
						style="width: 60rpx;height:60rpx"></image>
					<image class="collection" src="/static/images/xin_1.png" v-if="!ke[0].showUpImg" @click="changeImg"
						style="width: 60rpx;height:60rpx"></image>
					<image class="collection" src="/static/images/pin.png" style="width: 60rpx;height:60rpx"></image>
					<button class="cu-btn bg-orange" @click="buy(ke[0].id,ke[0].url,ke[0].name,ke[0].time,ke[0].price,ke[0].gou,ke[0].goumai)">{{ke[0].goumai}}</button>
				</view>
			</view>

		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				// showUpImg: true,
				// ke:{
				// 		url:'../../static/shu/01.png',
				// 		name:'计算机理论',
				// 		time:'2019年12月3日',
				// 		price:300,
				// 		gou:'已有1000人购买'
				// 	}
				ke:[],
				curriculum:{}
			}
		},
		methods: {
			buy(id,url,name,time,price,gou,goumai) {
				this.curriculum.id = id
				this.curriculum.url = url;
				this.curriculum.name = name;
				this.curriculum.time = time;
				this.curriculum.price = price;
				this.curriculum.gou= gou
				this.curriculum.goumai= goumai
				this.curriculum.yigoumai ='已购买'
				console.log(this.curriculum)
				if(this.curriculum.goumai == this.curriculum.yigoumai){
					uni.showModal({
						content:"已经购买了，亲"
					})
				}else{
				uni.showModal({
					title: '友情提示',
					content: '是否确定购买',
					success: function(res) {
						if (res.confirm) {
							console.log('用户点击确定');
							// console.log(this.ke)
							uni.request({
								url:"http://127.0.0.1:3000/users/kecheng",
								data:{
									kecheng:this.curriculum
								},
								method:'POST',
								success: (res) => {
									
								}
							})
							uni.request({
								url:"http://127.0.0.1:3000/users/yigoumai",
								data:{
									kecheng:this.curriculum.yigoumai,
									kechengid:this.curriculum.id
								},
								method:'POST',
								success: (res) => {
									
								}
							})
						} else if (res.cancel) {
							console.log('用户点击取消');
						}
					}.bind(this)
				});
				}
			},
			changeImg: function() {
				this.ke[0].showUpImg = !this.ke[0].showUpImg
			}
		},
		onLoad() {
			uni.request({
				url:"http://127.0.0.1:3000/users/curriculum",
				success: (res) => {
					this.ke = res.data
				}
			})
		}
	}
</script>

<style lang="scss">
	.cu-btn {
		// text-align: right;
		// margin-right: 20rpx;
	}

	.money {
		color: #f8722e;
		margin: 25rpx;
		font-size: 16px;
	}

	.money_1 {
		margin-left: 20rpx;
		color: #999999;
		font-size: 10px;
	}
</style>
