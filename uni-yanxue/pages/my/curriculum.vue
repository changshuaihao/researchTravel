<template>
	<view>
		<view class="last" v-for="(item,index) in ke" v-if="length>0" :key="index" >
			<image class="head-cc" :src="item.url" @tap="gotoLunBo"/>
			<view>
				<view class="last01">
					{{item.name}}
				</view>
				<view class="last02">
					{{item.time}}
					<text>马士兵教育</text>
				</view>
				<view class="last03">
					<view class="last-view">￥{{item.price}}<br><span class="last-view-span">{{item.gou}}</span></view>
					<view class="last03-button">已购买</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				ke:[],
				length:0
			}
		},
		onLoad() {
			uni.request({
				url: "http://127.0.0.1:3000/users/kecheng",
				success: (res) => {
					this.ke=res.data
					this.length=res.data.length;
					console.log(this.length)
					console.log(res.data)
				}
			})
		},
		methods:{
		    gotoLunBo(){
		        uni.navigateTo({
		            // url: 'test?id=1&name=uniapp'  c传递参数		
		            url:"/pages/study/study"
		
		        })
		    }
		},
	}
</script>

<style>
	.last {
		display: flex;
		flex-direction: row;
		height: 250rpx;
		width: 95%;
		margin: 30rpx 0rpx 20rpx 20rpx;
		background-color: white;
	}

	.head-cc {
		height: 220rpx;
		line-height: 220rpx;
		width: 40%;
		margin: 15rpx 0rpx 0rpx 20rpx;
		border-radius: 10px;
	}

	.last01 {
		font-size: 15px;
		width: 95%;
		margin: 25rpx 0rpx 0rpx 20rpx;
	}

	.last02 {
		font-size: 11px;
		font-weight: 300;
		margin: 20rpx 0rpx 0rpx 30rpx;
	}

	.last02>text {
		margin-left: 40rpx;
	}

	.last03 {
		/* width: 40%; */
		display: flex;
		/* background-color: #007AFF; */
		margin-left: 30rpx;
	}

	.last-view {
		color: red;
		margin: 30rpx 0 0 0;
		font-size: 14px;
	}

	.last-view-span {
		color: #52555a;
		font-size: 11px;
	}

	.last03-button {
		width: 140rpx;
		height: 70rpx;
		line-height: 70rpx;
		font-size: 14px;
		text-align: center;
		border-radius: 20rpx;
		border: 1px solid #fff8db;
		color: red;
		background-color: #fffeee;
		margin-top: 15px;
		margin-left: 30rpx;
		/* 		font-size: 10px;
		width: 100rpx;
		height: 40rpx;
		margin-top: 40rpx;
		margin-left: 30rpx;
		line-height: 40rpx;
		background-color: white;
		color: #F59A23; */
		/* border: 0px solid #F59A23; */
	}
</style>
