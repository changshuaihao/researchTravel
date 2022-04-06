<template>
	<view>
		<view class="content-v">
			<view class="">
				创建：2020-12-25 16：23:30
			</view>
			<view class="content-v-01">
				完成交易
			</view>
		</view>
		<view class="last">
			<image src="../../static/my/09.png" />
			<view>
				<view class="last01">
					JAVA程序员涨薪必备【马士兵教育】
				</view>
				<view class="last02">
					共95节
					<text>马士兵教育</text>
				</view>
				<view class="last03">
					<button>评价</button>
					<button>分享</button>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
</script>

<style>
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
