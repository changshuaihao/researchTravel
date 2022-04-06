<template>
	<view>
		<view class="zf">
			<input type="text" value="搜索订单" />
		</view>
		<view class="tab">
			<view class="tab-item" :class="tab==0?'active':''" @click="change" :data-value="0">全部</view>
			<view class="tab-item" :class="tab==1?'active':''" @click="change" :data-value="1">待支付</view>
			<view class="tab-item" :class="tab==2?'active':''" @click="change" :data-value="2">待评价</view>
			<view class="tab-item" :class="tab==3?'active':''" @click="change" :data-value="3">待退款</view>
		</view>
		<view class="content">
			<view v-if="tab==0">
				<view v-for="(item,index) in ke" v-if="length>0" :key="index">
					<view class="last">
						<image :src="item.url" />
						<view>
							<view class="last01">
								{{item.name}}
							</view>
							<view class="last02">
								{{item.time}}
								<text>马士兵教育</text>
							</view>
							<view class="last03">
								<view class="last-view">￥{{item.price}}<br><span
										class="last-view-span">{{item.gou}}</span></view>
								<view class="last03-button">评价</view>
							</view>
						</view>
					</view>
				</view>
			</view>
			<view v-if="tab==1">
				<image class="t2" src="../../static/my/订单%20(1).png" />
				<view class="view-t2">你还没有相关的订单</view>
			</view>
			<view v-if="tab==2">
				<myevaluate></myevaluate>
			</view>
			<view v-if="tab==3">
				<view v-for="(item,index) in ke" v-if="length>0" :key="index">
					<view class="last">
						<image :src="item.url" />
						<view>
							<view class="last01">
								{{item.name}}
							</view>
							<view class="last02">
								{{item.time}}
								<text>马士兵教育</text>
							</view>
							<view class="last03">
								<view class="last-view">￥{{item.price}}<br><span
										class="last-view-span">{{item.gou}}</span></view>
								<view class="last03-button" @click="tuikuang(item.id)">退款</view>
							</view>
						</view>
					</view>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	import myevaluate from '../../components/my-evaluate/my-evaluate.vue'
	export default {
		data() {
			return {
				tab: 0,
				value: 0,
				ke: [],
				length: 0
			}
		},
		props: ['title'],
		methods: {
			change(e) {
				console.log(e.target.dataset.value),
					this.tab = e.target.dataset.value
			},
			tuikuang(id) {
				let idd = id
				let goumai = '购买'
				uni.showModal({
					title: '友情提示',
					content: '是否确定退款',
					success: function(res) {
						if (res.confirm) {
							console.log('用户点击确定');
							uni.request({
								url: "http://127.0.0.1:3000/users/tuikuang",
								data: {
									id: idd,
									gou: goumai
								},
								method: 'POST',
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
		components: {
			myevaluate
		},
		onLoad: function(option) { //option为object类型，会序列化上个页面传递的参数   
			this.tab = option.id
			console.log(option.id); //打印出上个页面传递的参数。
			uni.request({
				url: "http://127.0.0.1:3000/users/kecheng",
				success: (res) => {
					this.ke = res.data
					this.length = res.data.length;
					console.log(this.length)
					console.log(res.data)
				}
			})
		}
	}
</script>

<style>
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
	}

	.last {
		display: flex;
		flex-direction: row;
		height: 250rpx;
		width: 95%;
		margin: 15rpx 0rpx 20rpx 20rpx;
		background-color: white;
	}

	.last>image {
		height: 220rpx;
		line-height: 220rpx;
		width: 40%;
		margin: 15rpx 0rpx 0rpx 20rpx;
	}

	.last01 {
		font-size: 14px;
		width: 95%;
		margin-top: 25rpx;
		margin-left: 45rpx;
	}

	.last02 {
		font-size: 11px;
		font-weight: 300;
		margin: 10rpx 0rpx 0rpx 30rpx;
	}

	.last02>text {
		margin-left: 40rpx;
	}

	page {
		background-color: #F2F2F2;
	}

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


	.zf>input {
		width: 80%;
		height: 60rpx;
		border-radius: 40rpx;
		font-size: 13px;
		margin-top: 20rpx;
		margin-left: 10%;
		padding-left: 40rpx;
		font-weight: 300;
		/* margin-top: 30rpx 0rpx 0rpx 30rpx; */
		border: 1px solid #FFCE35;
	}

	.zhifu {
		width: 100%;
		height: 80rpx;
		display: flex;
		margin-top: 20rpx;
	}

	.zhifu>view {
		height: 65rpx;
		line-height: 65rpx;
		flex: 1;
		font-size: 12px;
		font-weight: 400;
		text-align: center;
	}

	.hr {
		width: 60%;
		margin-left: 20%;
		text-align: center;
		height: 8rpx;
		background-color: #F59A23;
	}

	.t2 {
		margin-top: 100rpx;
		width: 50%;
		margin-left: 25%;
		height: 350rpx;
	}

	.view-t2 {
		width: 100%;
		text-align: center;
	}

	.content-v {
		margin-left: 30rpx;
		margin-right: 30rpx;
		margin-top: 20rpx;
		display: flex;
		width: 93%;
		height: 70rpx;
		line-height: 70rpx;
		background-color: white;
		font-size: 12px;
		font-weight: 330;
		padding-left: 12rpx;
	}

	.content-v-01 {
		color: #F59A23;
		font-weight: 500;
		margin-left: 200rpx;
	}

	.last {
		display: flex;
		flex-direction: row;
		height: 250rpx;
		width: 95%;
		margin: 15rpx 0rpx 20rpx 20rpx;
		background-color: white;
	}

	.last>image {
		height: 220rpx;
		line-height: 220rpx;
		width: 40%;
		margin: 15rpx 0rpx 0rpx 20rpx;
	}

	.last01 {
		font-size: 12px;
		width: 95%;
		margin: 25rpx 0rpx 0rpx 20rpx;
	}

	.last02 {
		font-size: 11px;
		font-weight: 300;
		margin: 10rpx 0rpx 0rpx 30rpx;
	}

	.last02>text {
		margin-left: 40rpx;
	}

	.last03 {
		/* width: 40%; */
		display: flex;
	}

	.last03>button {
		font-size: 10px;
		width: 30%;
		height: 40rpx;
		margin-top: 40rpx;
		margin-left: 30rpx;
		line-height: 40rpx;
		background-color: white;
		color: #F59A23;
		border: 1px solid #F59A23;
	}
</style>
