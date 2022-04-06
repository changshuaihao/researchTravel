<template>
	<view>
		<view class="my">
			<view class="my01">
				<!-- <image src="../../static/my/dl.png" /> -->
				<view>
					<image class="img_my" :src="yonghuwx.url"/>
				</view>
				<!-- <view class="my01"> -->
				<text class="my01-t">{{yonghuwx.username}}</text>
			</view>
			<view class="my01-te" @click="xinxi">信息完善</view>
			<!-- </view> -->
		</view>
		<mylist @myValue="getNum"></mylist>
		<mycatalog></mycatalog>
		<travel></travel>
	</view>
</template>

<script>
	import mylist from '../../components/my-list/my-list.vue'
	import mycatalog from '../../components/my-catalog/my-catalog.vue'
	import travel from '../../components/travel/travel.vue'
	export default {
		data() {
			return {
				index: 0,
				yonghuwx: []
			}
		},
		methods: {
			getNum(index) {
				this.index = index
			},
			g() {
				console.log(index_tab)
			},
			xinxi() {
				uni.navigateTo({
					url: '../my/information'
				})
			},
			getUserInfo() {
				
			}
		},
		components: {
			mylist,
			mycatalog,
			travel
		},
		//获取微信图像和微信呢称
		onLoad() {
			uni.request({
				url:"http://127.0.0.1:3000/users/login",
				success: (res) => {
					this.yonghuwx = res.data
					console.log(this.yonghuwx)
				}
			})
		},
	}
</script>

<style>
	page {
		background-color: #D7D7D7;
	}

	.my {
		width: 96%;
		height: 250rpx;
		background-color: white;
		margin: 15rpx 0rpx 15rpx 15rpx;
		display: flex;
	}
	.my01 {
		margin-top: 7%;
		margin-left: 10%;
		height: 150rpx;
		line-height: 150rpx;
		width: 55%;
		align-content: center;
		display: flex;
		
	}
	.img_my {
		height: 150rpx;
		width: 150rpx;
		border-radius: 50px;
	}

	.my01-t {
		font-size: 17px;
		margin-left: 50rpx;
		padding-top: -70rpx;
	}

	.my01-te {
		margin-top: 95rpx;
		margin-left: 5%;
		font-size: 17px;
		
	}

	.menu {
		background-color: white;
		margin: 15rpx 0rpx 15rpx 15rpx;
		width: 96%;
	}

	.menu>view {
		padding: 20rpx;
		line-height: 60rpx;
		border-bottom: 1px solid #efefef;
		height: 60rpx;
	}

	.menu>view:last-child {
		border: none;
	}

	.arrow {
		float: left;
		width: 65rpx;
		height: 65rpx;
		line-height: 65rpx;
	}

	.arrow02 {
		margin-left: 25rpx;
		font-size: 13px;
	}

	.arrow01 {
		width: 30rpx;
		height: 32rpx;
		float: right;
		margin-top: 16rpx;
	}

	.last {
		background-color: white;
		margin: 15rpx 0rpx 15rpx 15rpx;
		width: 96%;
		height: 120rpx;
		border-radius: 15rpx;
	}

	.last01 {
		font-size: 17px;
		font-weight: 800;
		margin-left: 20rpx;
		padding-top: 20rpx;
	}

	.last02 {
		font-size: 10px;
		font-weight: 200;
		padding-left: 20rpx;
		padding-left: 20rpx;
	}

	.last03 {
		float: right;
		background-color: yellow;
		width: 170rpx;
		height: 40rpx;
		text-align: center;
		border-radius: 80rpx;
		font-size: 12px;
		margin-top: 30rpx;
		margin-right: 30rpx;
	}

	.last04 {
		float: left;
	}
</style>
